<?php
namespace System\tools\session;

use System\tools\rounting\Redirect;
/**
 * Class Flash_Messages
 */
class Message
{
    /**
     * construct session
     */
    public function __construct()
    {
        // create the session array if it doesn't already exist
        if(!isset($_SESSION['flash_message']))
        {
            $_SESSION['flash_message'] = array(
                'type' => null,
                'title' => null,
                'message' => null
            );
        }
    }

    /**
     * save flash message to session
     * @param $type
     * @param $message
     */
    public static function add($type,$title, $message)
    {
        $_SESSION['flash_message'] = array(
            'type' => $type,
            'title' => $title,
            'message' => $message
        );
    }

    //funcion para redireccionar a otra pagina y a la vez mostrar un mensaje de sweetalert
    public static function send($type,$message)
    {
        $_SESSION['flash_message'] = array(
            'type' => $type,
            'title' => null,
            'message' => $message
        );
        //header('Location: '.baseUrl.''.$url.'');
    }

    /**
     * recall flash message from session and display
     * @return string
     */
    public static function show()
    {
        if(!is_null($_SESSION['flash_message']))
        {
            $type = $_SESSION['flash_message']['type'];
            $title = $_SESSION['flash_message']['title'];
            $message = $_SESSION['flash_message']['message'];
            unset($_SESSION['flash_message']); // unset flash_message key

            return "<script>
            swal('".$title."','".$message."','".$type."');
            </script>";
        } else {
            return false;
        }
    }

    public static function send2($type,$message)
    {
        $_SESSION['flash_message'] = array(
            'type' => $type,
            'title' => null,
            'message' => $message
        );
        //header('Location: '.baseUrl.''.$url.'');
    }

    /**
     * recall flash message from session and display
     * @return string
     */
    public static function show2()
    {
        if(!is_null($_SESSION['flash_message']))
        {
            $type = $_SESSION['flash_message']['type'];
            $title = $_SESSION['flash_message']['title'];
            $message = $_SESSION['flash_message']['message'];
            unset($_SESSION['flash_message']); // unset flash_message key

            return "<script>
            swal('".$title."','".$message."','".$type."');
            </script>";
        } else {
            return false;
        }
    }

    public static function sendQuestion($urlConfirm,$type,$message)
    {
        $_SESSION['flash_question'] = array(
            'type' => $type,
            'title' => null,
            'message' => $message,
            'url'   => baseUrl.''.$urlConfirm
        );
        //header('Location: '.baseUrl.''.$url.'');
    }

    public static function showQuestion()
    {
        if(!is_null($_SESSION['flash_question']))
        {
            $type = $_SESSION['flash_question']['type'];
            $title = $_SESSION['flash_question']['title'];
            $message = $_SESSION['flash_question']['message'];
            $url = $_SESSION['flash_question']['url'];
            unset($_SESSION['flash_question']); // unset flash_message key

            return "
            <script>
            swal({
              title: '".$title."',
              text: '".$message."',
              type: '".$type."',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'SI'
            }).then(function () {
            window.location.replace('".$url."');
            })
            </script>
            ";
        } 
        else 
        {
            return false;
        }
    }



    public static function hasMessages()
    {
        if(!isset($_SESSION['flash_message']))
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public static function hasQuestion()
    {
        if(!isset($_SESSION['flash_question']))
        {
            return false;
        }
        else
        {
            return true;
        }
    }

}