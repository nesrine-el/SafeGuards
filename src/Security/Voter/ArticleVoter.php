<?php

namespace App\Security\Voter;

use App\Entity\Article;
use App\Entity\User;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;


class ArticleVoter extends Voter
{
    const VIEW = 'view';
    const NEW = 'new';
    const EDIT = 'edit';
    const SHOW = 'show';

    private Security $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    protected function supports(string $attribute, mixed $subject): bool
    {
        if (!in_array($attribute, [self::VIEW, self::EDIT, self::SHOW, self::NEW])) {
            return false;
        }

        if (!$subject instanceof Article) {
            return false;
        }

        return true;
    }

    protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();
        if (!$user instanceof UserInterface || !$user instanceof User) {
            return false;
        }

        /** @var Article $article */
        $article = $subject;

        return match($attribute) {
            self::VIEW => $this->canView($article, $user),
            self::NEW => $this->canNew($article, $user),
            self::EDIT => $this->canEdit($article, $user),
            self::SHOW => $this->canShow($article, $user),
            default => throw new \LogicException('This code should not be reached!')
        };
    }

    private function canView(Article $article, User $user): bool
    {
        // if they can edit, they can view
        if ($this->canEdit($article, $user)) {
            return true;
        }

        if ($this->security->isGranted('ROLE_ADMIN')) {
            return true;
        }

        // Assuming the Article entity has an isPrivate method
        return true;
    }

    private function canEdit(Article $article, User $user): bool
    {
        
        if ($this->security->isGranted('ROLE_ADMIN')) {
            return true;
        }
        // Assuming the Article entity has a getUser method
        // return  $user === ($article->getUser() && in_array( 'USER_AUTHOR',  $user->getRoles()));
        return true;
        
    }

    private function canShow(Article $article, User $user): bool
    {
        // Assuming the Article entity has an isPrivate method
        return true;
    }

    private function canNew(Article $article, User $user): bool
    {


        if ($this->security->isGranted('ROLE_ADMIN')) {
            return true;
        }

        // Assuming the Article entity has an isPrivate method
        // return  $user === ($article->getUser() && in_array( 'USER_AUTHOR',  $user->getRoles()));
        return true;
    }
    




}
