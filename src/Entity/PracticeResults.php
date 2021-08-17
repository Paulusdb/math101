<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PracticeResultsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PracticeResultsRepository::class)
 */
class PracticeResults
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $topic;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $subTopic;

    /**
     * @ORM\Column(type="integer")
     */
    private int $exerciseQuantity;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $amountGood;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $amountWrong;

    /**
     * @ORM\Column(type="date")
     */
    private \DateTimeInterface $date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getTopic(): ?string
    {
        return $this->topic;
    }

    public function setTopic(string $topic): self
    {
        $this->topic = $topic;

        return $this;
    }

    public function getSubTopic(): ?string
    {
        return $this->subTopic;
    }

    public function setSubTopic(string $subTopic): self
    {
        $this->subTopic = $subTopic;

        return $this;
    }

    public function getExerciseQuantity(): ?int
    {
        return $this->exerciseQuantity;
    }

    public function setExerciseQuantity(int $exerciseQuantity): self
    {
        $this->exerciseQuantity = $exerciseQuantity;

        return $this;
    }

    public function getAmountGood(): ?int
    {
        return $this->amountGood;
    }

    public function setAmountGood(?int $amountGood): self
    {
        $this->amountGood = $amountGood;

        return $this;
    }

    public function getAmountWrong(): ?int
    {
        return $this->amountWrong;
    }

    public function setAmountWrong(?int $amountWrong): self
    {
        $this->amountWrong = $amountWrong;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }
}
