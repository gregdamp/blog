<?php

use \gregdamp\Model\UserRepository;

require('./Model/UserRepository.php');

function addUser() {
    
    $userRepository = new UserRepository();
    $userRepository->addUser();
    
}

function connectUser() {

	$userRepository = new UserRepository();
	$userRepository->connectUser();
}
