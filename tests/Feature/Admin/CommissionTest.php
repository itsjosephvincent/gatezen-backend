<?php

namespace Tests\Feature\Admin;

use App\Models\Admin;
use App\Models\Commission;
use App\Models\Payout;
use Tests\TestCase;

class CommissionTest extends TestCase
{
    public function test_show_all_commission()
    {
        $admin = Admin::take(1)->first();
        $token = $admin->createToken('token-name');

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('GET', 'api/admin/commissions')
            ->assertStatus(200);
    }

    public function test_show_commission_by_id()
    {
        $admin = Admin::take(1)->first();
        $token = $admin->createToken('token-name');
        $commission = Commission::take(1)->first();

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('GET', 'api/admin/commissions/' . $commission->id)
            ->assertStatus(200);
    }

    public function test_update_commission()
    {
        $admin = Admin::take(1)->first();
        $token = $admin->createToken('token-name');
        $payout = Payout::take(1)->first();
        $commissions = Commission::where('payout_id', $payout->id)->get();

        $payload = [
            'internal_note' => 'n/a'
        ];

        foreach ($commissions as $commission) {
            $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
                ->json('PUT', 'api/admin/commissions/' . $commission->id, $payload)
                ->assertStatus(200);
        }
    }
}
