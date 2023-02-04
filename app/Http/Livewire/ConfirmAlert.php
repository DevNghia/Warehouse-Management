<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ConfirmAlert extends Component
{
    /**
     * Contact Id
     *
     * @var [inf]
     */
    public $contactId;
    /**
     * Render the confirm-alert button
     * @return view
     * @author Rashid Ali <realrashid05@gmail.com>
     */
    public function render()
    {
        return view('livewire.confirm-delete');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @author Rashid Ali <realrashid05@gmail.com>
     */
}
