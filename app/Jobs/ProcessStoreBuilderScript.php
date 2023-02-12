<?php

namespace App\Jobs;

use App\Models\ErrorLog;
use App\Repositories\ServerRepository;
use App\Repositories\StoreServerRepository;
use App\Repositories\StoreTemplateRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;


enum StoreBuilderScriptAction: string
{
    case Create = 'create';
    case Enable = 'enable';
    case Disable = 'disable';
}


class ProcessStoreBuilderScript implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $tries = 5;

    protected $store;
    protected $template;
    protected $server;
    protected $storeServer;
    protected $action;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($store, StoreBuilderScriptAction $action = StoreBuilderScriptAction::Create)
    {
        $this->store = $store;
        $this->template = new StoreTemplateRepository();
        $this->server = new ServerRepository();
        $this->storeServer = new StoreServerRepository();
        $this->action = $action;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $error = new ErrorLog();
        $newStore = $this->store;
        $storeTemplate = $this->template->findOneById($newStore->template_id);
        $newServer = $this->server->findMany();
        $newStoreServer = $this->storeServer->findOneById($newStore->id);

        try {

            switch ($this->action) {

                case StoreBuilderScriptAction::Create:
                    $process = $this->createStoreCmd($newStore, $storeTemplate, $newServer);
                    break;
                case StoreBuilderScriptAction::Enable:
                    $process = $this->enableStoreCmd($newStore, $storeTemplate);
                    break;
                case StoreBuilderScriptAction::Disable:
                    $process = $this->disableStoreCmd($newStore, $storeTemplate);
                    break;
            }


            $process->setWorkingDirectory(base_path());
            $process->mustRun();

            $error->error_type = 'Envoy';
            $error->description = $process->getOutput();
            $error->save();
        } catch (ProcessFailedException $exception) {

            dd($exception);
            $errorType = 'Envoy';
            $errorMessage = $exception->getMessage();

            $error->error_type = $errorType;
            $error->description = $errorMessage;
            $error->save();

            SendStoreBuilderErrorEmail::dispatch($errorType, $errorMessage)
                ->onQueue('sendemail');
        }
        return response()->json(['message' => $error]);
    }


    private function createStoreCmd($newStore, $storeTemplate, $newServer)
    {
        return  Process::fromShellCommandline(env('PHP_BINARY').' vendor/bin/envoy run add-store ' . '--store_url=' . $newStore->url . ' ' . '--repo=' . $storeTemplate->repo_url . ' ' . '--store_server_ip_address=' . $newServer->ip_address . ' ' . '--store_server_port=' . $storeTemplate->port);
    }

    private function enableStoreCmd($newStore, $storeTemplate)
    {
        return  Process::fromShellCommandline(env('PHP_BINARY').' vendor/bin/envoy run enable-store ' . '--store_url=' . $newStore->url .  ' --store_server_port=' . $storeTemplate->port);
    }

    private function disableStoreCmd($newStore, $storeTemplate)
    {
        return  Process::fromShellCommandline(env('PHP_BINARY').' vendor/bin/envoy run disable-store ' . '--store_url=' . $newStore->url .  ' --store_server_port=' . $storeTemplate->port);
    }
}
