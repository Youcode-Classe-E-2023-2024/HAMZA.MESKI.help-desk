<?php
    require_once '../model/UsersDB.php';

    class LoggerDispaly
    {
        private $usersDatabase;
        public function __construct(UsersDB $usersDatabase){
            $this->usersDatabase = $usersDatabase;
        }
    
        public function displayUserProfile($userId){
            $html = '';
            $users = $this->usersDatabase->displayUsers();
            
            foreach ($users as $user) {
                if ($user->id == $userId) {
                    $html .= $this->renderUserProfile($user);
                    break;
                }
            }
            echo $html;
        }
    
        private function renderUserProfile($user){
            return <<<HEREDOC
                <div class="profileButton flex items-center gap-2 cursor-pointer">
                    <strong>{$user->username}</strong>
                    <div class="h-12 w-12 rounded-full bg-black" style="background-image: url('../images/{$user->avatar}'); background-size: cover;"></div>
                </div>
            HEREDOC;
        }
    }
    $userDisplay = new LoggerDispaly($users_database);
    $userDisplay->displayUserProfile($_SESSION['user-id']);
?>