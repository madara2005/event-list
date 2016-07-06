<?php

function flash($flash_message, $flash_status)
{
	session()->flash('flash_message', $flash_message);
	session()->flash('flash_status', $flash_status);

}


?>