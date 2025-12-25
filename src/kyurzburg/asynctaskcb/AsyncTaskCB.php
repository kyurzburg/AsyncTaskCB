<?php

namespace kyurzburg\asynctaskcb;

use pocketmine\scheduler\AsyncTask;

abstract class AsyncTaskCB extends AsyncTask{

    private int $callback_id;

    public function setCallbackId(int $id) : void {
        $this->callback_id = $id;
    }

    public function getCallbackId() : int {
        return $this->callback_id;
    }

    /**
     * @see AsyncTaskCallbacks::resolve()
     */
    public function onCompletion() : void {
        AsyncTaskCallbacks::resolve($this->callback_id, $this->getResult());
    }
}