<?php
  namespace App;

  use PDO;
  use App\User;

  class UserRepository {

    private $base;

    public function __construct(PDO $base)
    {
        $this->base = $base;
    }

    public function add(User $user)
    {
        $response = $this->base->prepare('INSERT INTO user (email, password, name) VALUES(:email, :password, :name)');
        $response->bindValue(':email', $user->getEmail());
        $response->bindValue(':password', $user->getPassword());
        $response->bindValue(':name', $user->getName());


        $response->execute();

        $user->hydrate(['id' => $this->base->lastInsertId()]);
    }

    public function exists(User $user)
   {
       $response = $this->base->prepare('SELECT COUNT(*) FROM user WHERE name = :name');
       $response->bindValue(':name', $user->getName());
       $response->execute();

       return (bool) $response->fetchColumn();
   }

   public function findByName(string $email)
   {
       $response = $this->base->prepare('SELECT * FROM user WHERE email = :email');
       $response->bindValue(':email', $email);
       $response->execute();

       return $response->fetch();
   }

   public function login(string $email, string $password)
    {
        if ($result = $this->findByName($email)) {
            if (password_verify($password, $result['password'])) {
                $user = $this->find($result['id']);
                $_SESSION['id'] = $user->getId();
                $_SESSION['name'] =  $user->getName();

                return $user;
            }
            return false;
        }
        return false;

    }

    public function find(int $id)
    {
        $response = $this->base->prepare('SELECT * FROM user WHERE id = :id');
        $response->bindValue(':id', $id);
        $result = $response->execute();
        if ($result === true) {
            $user = new User($response->fetch());
            return $user;
        }

        return false;

    }

  }

?>
