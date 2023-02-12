<?php

namespace App\Repositories;

use App\Enum\PartnershipStatus;
use App\Interfaces\Repositories\TheGateIndexRepositoryInterface;
use App\Models\TheGateIndex;

class TheGateIndexRepository implements TheGateIndexRepositoryInterface
{
    public function findUser($payload)
    {
        if (isset($payload['tgi_portal_id'])) {
            return TheGateIndex::where('tgi_user_id', $payload['tgi_user_id'])
                ->where('portal_id', $payload['tgi_portal_id'])
                ->first();
        } else {
            return TheGateIndex::where('tgi_user_id', $payload['tgi_user_id'])
                ->where('portal_id', $payload['portal_id'])
                ->first();
        }
    }

    public function createUser($payload, $userId)
    {
        if ($payload['is_partnership_paid'] == false) {
            $tgi = new TheGateIndex();
            $tgi->user_id = $userId;
            $tgi->tgi_user_id = $payload['tgi_user_id'];
            $tgi->tgi_referral_code = $payload['tgi_referral_code'];
            $tgi->company_name = isset($payload['company_name']) ? $payload['company_name'] : NULL;
            $tgi->company_registration_number = isset($payload['company_registration_number']) ? $payload['company_registration_number'] : NULL;
            $tgi->company_address = isset($payload['company_address']) ? $payload['company_address'] : NULL;
            $tgi->euro_in_tokens = isset($payload['euro_in_tokens']) ? $payload['euro_in_tokens'] : NULL;
            $tgi->euro_in_shares = isset($payload['euro_in_shares']) ? $payload['euro_in_shares'] : NULL;
            $tgi->partner_role_name = $payload['partner_role_name'];
            $tgi->created_on_date = $payload['created_on_date'];
            $tgi->portal_id = $payload['portal_id'];
            $tgi->portal_name = $payload['portal_name'];
            $tgi->role_id = $payload['role_id'];
            $tgi->is_partnership_paid = false;
            $tgi->account_type = $payload['account_type'];
            $tgi->save();

            return $tgi->fresh();
        } else {
            $tgi = new TheGateIndex();
            $tgi->user_id = $userId;
            $tgi->tgi_user_id = $payload['tgi_user_id'];
            $tgi->tgi_referral_code = $payload['tgi_referral_code'];
            $tgi->company_name = isset($payload['company_name']) ? $payload['company_name'] : NULL;
            $tgi->company_registration_number = isset($payload['company_registration_number']) ? $payload['company_registration_number'] : NULL;
            $tgi->company_address = isset($payload['company_address']) ? $payload['company_address'] : NULL;
            $tgi->euro_in_tokens = isset($payload['euro_in_tokens']) ? $payload['euro_in_tokens'] : NULL;
            $tgi->euro_in_shares = isset($payload['euro_in_shares']) ? $payload['euro_in_shares'] : NULL;
            $tgi->partner_role_name = $payload['partner_role_name'];
            $tgi->created_on_date = $payload['created_on_date'];
            $tgi->portal_id = $payload['portal_id'];
            $tgi->portal_name = $payload['portal_name'];
            $tgi->role_id = $payload['role_id'];
            $tgi->is_partnership_paid = true;
            $tgi->account_type = $payload['account_type'];
            $tgi->save();

            return $tgi->fresh();
        }
    }

    public function updateUser($payload, $userId)
    {
        if (isset($payload['tgi_portal_id'])) {
            $tgi = TheGateIndex::where('user_id', $userId)->first();
            $tgi->tgi_user_id = $payload['tgi_user_id'];
            $tgi->tgi_referral_code = $payload['tgi_referral_code'];
            $tgi->company_name = $payload['company_name'];
            $tgi->company_registration_number = $payload['company_registration_number'];
            $tgi->euro_in_tokens = $payload['euro_in_tokens'];
            $tgi->euro_in_shares = $payload['euro_in_shares'];
            $tgi->partner_role_name = $payload['partner_role_name'];
            $tgi->created_on_date = $payload['created_on_date'];
            $tgi->portal_id = $payload['tgi_portal_id'];
            $tgi->portal_name = $payload['portal_name'];
            $tgi->role_id = $payload['role_id'];
            $tgi->is_partnership_paid = $payload['is_partnership_paid'];
            $tgi->account_type = $payload['account_type'];
            $tgi->save();

            return $tgi->fresh();
        } else {
            $tgi = TheGateIndex::where('user_id', $userId)->first();
            $tgi->tgi_user_id = $payload['tgi_user_id'];
            $tgi->tgi_referral_code = $payload['tgi_referral_code'];
            $tgi->company_name = $payload['company_name'];
            $tgi->company_registration_number = $payload['company_registration_number'];
            $tgi->euro_in_tokens = $payload['euro_in_tokens'];
            $tgi->euro_in_shares = $payload['euro_in_shares'];
            $tgi->partner_role_name = $payload['partner_role_name'];
            $tgi->created_on_date = $payload['created_on_date'];
            $tgi->portal_id = $payload['portal_id'];
            $tgi->portal_name = $payload['portal_name'];
            $tgi->role_id = $payload['role_id'];
            $tgi->is_partnership_paid = $payload['is_partnership_paid'];
            $tgi->account_type = $payload['account_type'];
            $tgi->save();

            return $tgi->fresh();
        }
    }
}
