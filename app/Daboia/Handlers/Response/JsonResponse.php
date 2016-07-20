<?php

namespace Daboia\Handlers\Response;

class JsonResponse {

    protected $status = 200;
    protected $data = [];
    protected $message = '';
    protected $success = true;

    /**
     * Constructor.
     *
     * @param  mixed  $data
     * @param  int    $status
     * @param  array  $headers
     */
    public function __construct( $data = null, $status = 200, $message = "" )
    {
        $this->set( 'results', $data );
        $this->set( 'status', $status );
        $this->set( 'message', $message );
    }

    public static function init( $data = null, $status = 200, $message = "" )
    {
        return self::__construct( $data, $status, $message );
    }

    public function set( $key, $value ) {
        $this->data[ $key ] = $value;
        return $this;
    }

    public function html( $content = '' )
    {
        $this->set( 'html', $content );
        return $this;
    }

    public function unauthorized( $message = '' )
    {
        $this->message = $message;
        $this->status = 401;
        $this->success = FALSE;
        return $this->render();
    }

    public function error( $message = '' ) {
        $this->message = $message;
        $this->status = 404;
        $this->success = FALSE;
        return $this->render();
    }

    public function success( $message = '' ) {
        $this->message = $message;
        $this->status = 200;
        $this->success = TRUE;
        return $this->render();
    }

    public function setArray( $arrayOfItems )
    {
        foreach( $arrayOfItems as $key => $value )
        {
            $this->set( $key, $value );
        }

        return $this;
    }

    public function redirect( $url )
    {
        $this->set( 'redirect', $url );
        return $this;
    }

    public function render() {
        return response()->json(
            array_merge( $this->data, [
                'status' => $this->status,
                'message' => $this->message,
                'success' => $this->success
            ] ),
            $this->status,
            [],
            JSON_PRETTY_PRINT
        );
    }

    // Test
    public function exception( \Exception $e )
    {
        switch( $e->getCode() )
        {
            case 401: return $this->unauthorized( $e->getMessage() ); break;
            case 404: return $this->error( $e->getMessage() ); break;
            default:
                return $this->error( $e->getMessage() ); break;
        }
    }

}