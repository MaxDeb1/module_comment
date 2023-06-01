<?php

namespace App\Controller\Api;

use App\Entity\Comment;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\AsController;

#[AsController]
final 
class CommentCreateController extends AbstractController
{

    public $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function __invoke(Comment $data)
    {
        $data->setAuthor($this->security->getUser());
        return $data;
    }
}