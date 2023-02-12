
@setup

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$sitesAvailableDir = env('SERVER_NGINX_SITES_AVAILABLE_DIR');
$sitesEnabledDir = env('SERVER_NGINX_SITES_ENABLED_DIR');
$storeDomain = str_replace(["http://","https://"], "", $store_url);
$user= env('STORE_SERVER_USER');
$certificatePath= env('STORE_SERVER_SSL_CERTIFICATE_PATH');
$certificateKeyPath= env('STORE_SERVER_SSL_CERTIFICATE_KEY_PATH');

@endsetup

@servers(['store-server' => $user])
{{-- @servers(['web' => '-i /home/contantinos/.ssh/test_rsa contantinos@localhost']) --}}
{{-- @servers(['config-server' => 'root@164.92.246.122', 'store-server' => 'root@' . $store_server_ip_address]) --}}



@story('add-store')
    create-nginx-config
    enable-nginx-config
    reload-nginx
@endstory

@story('delete-store')
    disable-nginx-config
    delete-nginx-config
    reload-nginx
@endstory

@story('enable-store')
    enable-nginx-config
    reload-nginx
@endstory

@story('disable-store')
    disable-nginx-config
    reload-nginx
@endstory


@task('create-nginx-config', ['on' => ['store-server']])
whoami
echo 'Creating nginx config for ' {{$storeDomain}}
cd {{ $sitesAvailableDir }}

sudo echo -e "server {

\t listen 443 ssl http2;
\t server_name {{ $storeDomain }} www.{{ $storeDomain }};

\t ssl_certificate  {{$certificatePath}}
\t ssl_certificate_key  {{$certificateKeyPath}}

\t location ^~ / {

\t\t proxy_pass http://0.0.0.0:{{ $store_server_port }};
\t\t proxy_set_header Host \$host;
\t\t proxy_set_header X-Real-IP \$remote_addr;
\t\t proxy_set_header X-Forwarded-For \$proxy_add_x_forwarded_for;
\t\t proxy_set_header REMOTE-HOST \$remote_addr;

\t}
}

server {
    \t listen 80;
    \t listen [::]:80;
    \t server_name {{ $storeDomain }} www.{{ $storeDomain }};
    \t return 302 https://\$server_name\$request_uri;
}

" > {{ $sitesAvailableDir }}/{{ $storeDomain }}.conf
@endtask

@task('enable-nginx-config', ['on' => ['store-server']])
echo 'Enabling nginx config'
sudo ln -s {{ $sitesAvailableDir }}/{{ $storeDomain }}.conf {{$sitesEnabledDir}}
@endtask

@task('disable-nginx-config', ['on' => ['store-server']])
echo 'Disabling nginx config'
cd {{ $sitesEnabledDir }}
sudo rm {{ $storeDomain }}.conf
@endtask

@task('delete-nginx-config', ['on' => ['store-server']])
sudo rm {{ $sitesAvailableDir }}/{{ $storeDomain }}.conf
@endtask


@task('reload-nginx', ['on' => ['store-server']])
{{-- sudo systemctl reload nginx --}}
/etc/init.d/nginx reload
@endtask


{{-- Old  --}}

@story('addNewStore')
clone
install-dependencies
copy-env
insert-app-url
build-app
set-up-ecosystem-config
run-application
create-configuration
enable-configuration
restart-nginx
@endstory

@task('clone', ['on' => ['store-server']])
@if($store_url && $repo)
mkdir {{ $storeApplicationsDirectory }}/{{ $updatedStoreURL }}
cd {{ $storeApplicationsDirectory }}/{{ $updatedStoreURL }}
git init
git remote add origin {{ $repo }}
git pull origin {{ $branch }}
@endif
@endtask

@task('install-dependencies', ['on' => ['store-server']])
npm install --legacy-peer-deps --prefix {{ $storeApplicationsDirectory }}/{{ $updatedStoreURL }}/
@endtask

@task('copy-env', ['on' => ['store-server']])
cp {{ $storeApplicationsDirectory }}/{{ $updatedStoreURL }}/.env.example {{ $storeApplicationsDirectory }}/{{
$updatedStoreURL }}/.env
@endtask

@task('insert-app-url', ['on' => ['store-server']])
echo -e "\nAPP_BASE_URL={{ $store_url }}" >> {{ $storeApplicationsDirectory }}/{{ $updatedStoreURL }}/.env
@endtask

@task('build-app', ['on' => ['store-server']])
npm run --prefix {{ $storeApplicationsDirectory }}/{{ $updatedStoreURL }}/ build
@endtask

@task('set-up-ecosystem-config', ['on' => ['store-server']])
touch ecosystem.config.js
echo -e "module.exports = {
\tapps: [
\t\t{
\t\t\tname: '{{ $store_url }}',
\t\t\texec_mode: 'cluster',
\t\t\tinstances: 'max',
\t\t\tscript: './.output/server/index.mjs',
\t\t\tenv: {
\t\t\t\tNODE_ENV: 'production',
\t\t\t\tPORT: '{{ $store_server_port }}',
\t\t\t}
\t\t}
\t]
}" >> {{ $storeApplicationsDirectory }}/{{ $updatedStoreURL }}/ecosystem.config.js
@endtask

@task('run-application', ['on' => ['store-server']])
cd {{ $storeApplicationsDirectory }}/{{ $updatedStoreURL }}
pm2 start ecosystem.config.js
pm2 save
@endtask

@task('create-configuration', ['on' => ['config-server']])
cd {{ $storeConfigurationDirectory }}
touch {{ $updatedStoreURL }}
echo -e "server {
\tlisten 80;
\tlisten [::]:80;

\troot {{ $storeApplicationsDirectory }}/{{ $updatedStoreURL }};

\tserver_name {{ $updatedStoreURL }} www.{{ $updatedStoreURL }};

\tlocation / {
\t\tproxy_pass http://{{ $configIpAddress }}:{{ $store_server_port }};
\t}
}" >> {{ $storeConfigurationDirectory }}/{{ $updatedStoreURL }}
@endtask

@task('enable-configuration', ['on' => ['config-server']])
sudo ln -s {{ $storeConfigurationDirectory }}/{{ $updatedStoreURL }} /etc/nginx/sites-enabled/
@endtask

