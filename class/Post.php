<?php
  namespace App;

  use DateTime;

  class Post {
    private $id;

    private $title;

    private $content;

    private $postDate;

    private $userName;

    public function __construct(array $arrayOfValues = null)
   {
       if ($arrayOfValues !== null) {
           $this->hydrate($arrayOfValues);
       }
   }

   public function hydrate(array $donnees)
   {
       foreach ($donnees as $key => $value)
       {
           $method = 'set'.ucfirst($key);

           if (method_exists($this, $method))
           {
               $this->$method($value);
           }
       }
   }


   //Getters and setters
   public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitle()
     {
         return $this->title;
     }

     public function setTitle($title)
     {
         $this->title = $title;
     }

     public function getContent()
      {
          return $this->content;
      }

      public function setContent($content)
      {
          $this->content = $content;
      }

      public function getPostDate()
       {
           return $this->postDate;
       }

       public function setPostDate($postDate)
       {
           $this->postDate = $postDate;
       }

       public function getUserName()
       {
         return $this->userName;
       }

       public function setUserName($userName)
       {
         $this->userName = $userName;
       }
  }

?>
