<?php

namespace App\Observers;

use App\Models\Phrase;
use App\Services\Phrase\PhraseService;

class PhraseObserver
{
    protected PhraseService $phraseService;

    public function __construct(PhraseService $phraseService)
    {
        $this->phraseService = $phraseService;
    }

    /**
     * Handle the Phrase "created" event.
     *
     * @param  \App\Models\Phrase  $phrase
     * @return void
     */
    public function created(Phrase $phrase)
    {

    }

    /**
     * Handle the Phrase "updated" event.
     *
     * @param  \App\Models\Phrase  $phrase
     * @return void
     */
    public function updated(Phrase $phrase)
    {
        //
    }

    /**
     * Handle the Phrase "deleted" event.
     *
     * @param  \App\Models\Phrase  $phrase
     * @return void
     */
    public function deleted(Phrase $phrase)
    {
        //
    }

    /**
     * Handle the Phrase "restored" event.
     *
     * @param  \App\Models\Phrase  $phrase
     * @return void
     */
    public function restored(Phrase $phrase)
    {
        //
    }

    /**
     * Handle the Phrase "force deleted" event.
     *
     * @param  \App\Models\Phrase  $phrase
     * @return void
     */
    public function forceDeleted(Phrase $phrase)
    {
        //
    }
}
