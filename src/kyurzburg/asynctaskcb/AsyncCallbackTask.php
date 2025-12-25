<?php

namespace kyurzburg\asynctaskcb;

use pocketmine\scheduler\AsyncTask;

class AsyncCallbackTask extends AsyncTask{

    private int $callback_id;

    public function setCallbackId(int $id) : void {
        $this->callback_id = $id;
    }

    public function getCallbackId() : int {
        return $this->callback_id;
    }

    public function onRun() : void {}

    /**
     * @see AsyncTaskCB::resolve()
     */
    public function onCompletion() : void {
        AsyncTaskCB::resolve($this->callback_id, $this->getResult());
    }
}