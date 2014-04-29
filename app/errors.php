<?php


class PermissionException extends Exception {
    
    public function __construct($message = null, $code = 403)
    {
        parent::__construct($message ?: 'Action not allowed', $code);
    }

}

class ValidationException extends Exception {
    protected $messages;
    
    public function __construct($validator)
    {
        $this->messages = $validator->messages();
        parent::__construct($this->messages, 400);
    }

    public function getMessages()  
    {
        return $this->messages;
    }

}

class NotFoundException extends Exception {
    public function __construct($message = null, $code = 404)
    {
        parent::__construct($message ?: 'Resource Not Found', $code);
    }
}
