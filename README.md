# AsyncTaskCB

How to use?

Step 1: Create a asynctask that extends AsyncCallbackTask
```php
use kyurzburg\asynctaskcb\AsyncCallbackTask;

class ExampleTask extends AsyncCallbackTask{

    public function onRun() : void{
        $this->setResult("result");
    }
}
```

Step 2: Send it
```php
AsyncTaskCB::new(new ExampleTask(), function(mixed $result){
#Your code here
});
```