<?php

namespace App\Observers;

use App\Models\Product;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ProductObserver
{
    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    public $afterCommit = true;
    
    /**
     * Handle the Product "created" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function created(Product $product)
    {
        DB::beginTransaction();
        try {
            $activityLog = new ActivityLog();
            $activityLog->product_id = $product['id'];
            $activityLog->title = $product['title'];
            $activityLog->user_name = $product['user_name'];
            $activityLog->product_name = $product['name'];
            $activityLog->price = $product['price'];
            $activityLog->description = $product['description'];
            $activityLog->action = 'created';
            $activityLog->save();
            /* Commit the transaction */
            DB::commit();
            return ['status' => 'success', 'message' => 'Product added successfully'];
        } catch(\Exception $e) { 
            /* An error occured; cancel the transaction */
            DB::rollback();
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    /**
     * Handle the Product "updated" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function updated(Product $product)
    {
        DB::beginTransaction();
        try {
            $activityLog = new ActivityLog();
            $activityLog->product_id = $product['id'];
            $activityLog->title = $product['title'];
            $activityLog->user_name = $product['user_name'];
            $activityLog->product_name = $product['name'];
            $activityLog->price = $product['price'];
            $activityLog->description = $product['description'];
            $activityLog->action = 'updated';
            $activityLog->save();
            /* Commit the transaction */
            DB::commit();
            return ['status' => 'success', 'message' => 'Product updated successfully'];
        } catch(\Exception $e) { 
            /* An error occured; cancel the transaction */
            DB::rollback();
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    /**
     * Handle the Product "deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function deleted(Product $product)
    {
        DB::beginTransaction();
        try {
            $activityLog = new ActivityLog();
            $activityLog->product_id = $product['id'];
            $activityLog->title = $product['title'];
            $activityLog->user_name = $product['user_name'];
            $activityLog->product_name = $product['name'];
            $activityLog->price = $product['price'];
            $activityLog->description = $product['description'];
            $activityLog->action = 'deleted';
            $activityLog->save();
            /* Commit the transaction */
            DB::commit();
            return ['status' => 'success', 'message' => 'Product deleted successfully'];
        } catch(\Exception $e) { 
            /* An error occured; cancel the transaction */
            DB::rollback();
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    /**
     * Handle the Product "restored" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function restored(Product $product)
    {
        //Log::info('deleted observer method is firing ' . $product)
    }

    /**
     * Handle the Product "force deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        //
    }
}
