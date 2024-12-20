<?php

namespace App\Observers;

use App\Models\Blog;
use Illuminate\Support\Facades\Log;

class BlogObserver
{
    /**
     * Handle the Blog "created" event.
     */
    public function created(Blog $blog): void
    {
        Log::info("A blog is created: ", $blog->toArray());
    }

    /**
     * Handle the Blog "updated" event.
     */
    public function updated(Blog $blog): void
    {
        //
    }

    /**
     * Handle the Blog "deleted" event.
     */
    public function deleted(Blog $blog): void
    {
        //
    }

    /**
     * Handle the Blog "restored" event.
     */
    public function restored(Blog $blog): void
    {
        //
    }

    /**
     * Handle the Blog "force deleted" event.
     */
    public function forceDeleted(Blog $blog): void
    {
        //
    }
}
