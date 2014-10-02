<?php

use google\appengine\api\users\User;
use google\appengine\api\users\UserService;

require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim(array(
    'view' => new \Slim\Views\Twig()
));

$app->log->setLevel(\Slim\Log::DEBUG);
$app->config('debug', true);



function isGoogleUSer(){
	$user = UserService::getCurrentUser();

	if (isset($user))
		return $user;
	else
		return null;
};

$isGoogleUserWrapper = function(){
	$user = isGoogleUser();
	$app = \Slim\Slim::getInstance();

	if (!isset($user))
		$app->redirect('/');
};



function home(){
	$app = \Slim\Slim::getInstance();
	$user = isGoogleUser();

	if (isset($user)){
		$app->redirect('/dashboard');
	}

	$loginurl = UserService::createLoginUrl('/dashboard');
	$app->render('home.php', array('loginurl' => $loginurl));
}

function dashboard(){
	$app = \Slim\Slim::getInstance();
	$db = new AppDB();
	$db = $db->connect();
	$user = isGoogleUser();

	if (!isset($db)){
		$app->render('error.php');
		$app->stop();
	}

	$groups = $db->getUserGroups($user->getEmail());
	$invites = $db->getUserInvitedGroups($user->getEmail());

	$params = array(
		'groups' => $groups,
		'invites' => $invites
	);

	$db = $db->disconnect();
	$app->render('dashboard.php', $params);
}

function groupview($id){
	$app = \Slim\Slim::getInstance();

	$db = new AppDB();
	$db = $db->connect();
	$user = isGoogleUser();

	if (!isset($db)){
		$app->render('error.php');
		$app->stop();
	}

	$groups = $db->getGroupInfo($id);

	foreach ($groups as $row){
		$group = $row;
		break;
	}

	$members = $db->getGroupMembers($id);

	$db = $db->disconnect();
	$app->render('groupview.php', array('group' => $group,
		'members' => $members));
}

function invite($id){
	$app = \Slim\Slim::getInstance();
	$db = new AppDB();
	$db = $db->connect();
	$user = isGoogleUser();
	$inviteEmail = $app->request->post('email');

	$db->InviteUserToGroup($id, $inviteEmail);

	$db = $db->disconnect();
	$app->redirect('/group/' . $id);
}

function joingroup($id){
	$app = \Slim\Slim::getInstance();
	$db = new AppDB();
	$db = $db->connect();
	$user = isGoogleUser();
	$inviteEmail = $app->request->post('email');

	$db->addUserToGroup($id, $user->getEmail());

	$db = $db->disconnect();
	$app->redirect('/group/' . $id);
}

function stream(){
	$app = \Slim\Slim::getInstance();
	$db = new AppDB();
	$db = $db->connect();
	$user = isGoogleUser();
	$members = array();
	$checkins = array();

	$groups = $db->getUserGroups($user->getEmail());
	foreach ($groups as $group){
		$groupMembers = $db->getGroupMembers($group['id']);
		foreach ($groupMembers as $groupMember){
			if ($user->getEmail() != $groupMember['email']){
				$members[] = $groupMember;
			}
		}	
	}

	foreach ($members as $member){
		$memberCheckins = $db->getUserLastCheckin($member['email']);
		foreach ($memberCheckins as $memberCheckin){
			$checkins[] = $memberCheckin;
		}
	}

	$db = $db->disconnect();
	$app->render('stream.php', array('checkins' => $checkins));
}

function checkinform(){
	$app = \Slim\Slim::getInstance();

	$app->render('checkin.php');
}

function checkin(){
	$app = \Slim\Slim::getInstance();
	$db = new AppDB();
	$db = $db->connect();
	$user = isGoogleUser();

	$args = array(
		'email' => $user->getEmail(),
		'statuslastmonth' => $app->request->post('howhaveyoubeen'),
		'statusthosearoundyou' => $app->request->post('howthosearoundyou'),
		'statuswork' => $app->request->post('howwaswork'),
		'newpastmonth' => $app->request->post('newpastmonth'),
		'newnextmonth' => $app->request->post('newnextmonth')
	);

	$db->addUserCheckin($args);
	$db = $db->disconnect();
	$app->redirect('/stream');
}


$app->get('/', home);
$app->get('/dashboard', $isGoogleUserWrapper, dashboard);
$app->get('/stream', $isGoogleUserWrapper, stream);
$app->get('/group/:id', $isGoogleUserWrapper, groupview);
$app->get('/checkinform', $isGoogleUserWrapper, checkinform);

$app->post('/invite/:id', $isGoogleUserWrapper, invite);
$app->post('/join/:id', $isGoogleUserWrapper, joingroup);
$app->post('/checkin', $isGoogleUserWrapper, checkin);

$app->run();

?>
