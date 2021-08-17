<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\TestResultsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TestResultsRepository::class)
 */
class TestResults
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
     * @ORM\Column(type="decimal", precision=3, scale=1)
     */
    private $grade;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $amountGood;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $amountWrong;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private ?\DateTimeInterface $timeSpend;

    /**
     * @ORM\Column(type="datetime")
     */
    private \DateTimeInterface $dateTime;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $amountAdd;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $amountWrongAdd;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $amountSubtract;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $amountWrongSubtract;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $amountMultiply;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $amountWrongMultiply;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $amountDivide;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $amountWrongDivide;

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

    public function getGrade()
    {
        return $this->grade;
    }

    public function setGrade($grade): self
    {
        $this->grade = $grade;

        return $this;
    }

    public function getAmountGood(): ?int
    {
        return $this->amountGood;
    }

    public function setAmountGood(int $amountGood): self
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

    public function getTimeSpend(): ?\DateTimeInterface
    {
        return $this->timeSpend;
    }

    public function setTimeSpend(?\DateTimeInterface $timeSpend): self
    {
        $this->timeSpend = $timeSpend;

        return $this;
    }

    public function getDateTime(): ?\DateTimeInterface
    {
        return $this->dateTime;
    }

    public function setDateTime(\DateTimeInterface $dateTime): self
    {
        $this->dateTime = $dateTime;

        return $this;
    }

    public function getAmountAdd(): ?int
    {
        return $this->amountAdd;
    }

    public function setAmountAdd(?int $amountAdd): self
    {
        $this->amountAdd = $amountAdd;

        return $this;
    }

    public function getAmountWrongAdd(): ?int
    {
        return $this->amountWrongAdd;
    }

    public function setAmountWrongAdd(?int $amountWrongAdd): self
    {
        $this->amountWrongAdd = $amountWrongAdd;

        return $this;
    }

    public function getAmountSubtract(): ?int
    {
        return $this->amountSubtract;
    }

    public function setAmountSubtract(?int $amountSubtract): self
    {
        $this->amountSubtract = $amountSubtract;

        return $this;
    }

    public function getAmountWrongSubtract(): ?int
    {
        return $this->amountWrongSubtract;
    }

    public function setAmountWrongSubtract(?int $amountWrongSubtract): self
    {
        $this->amountWrongSubtract = $amountWrongSubtract;

        return $this;
    }

    public function getAmountMultiply(): ?int
    {
        return $this->amountMultiply;
    }

    public function setAmountMultiply(?int $amountMultiply): self
    {
        $this->amountMultiply = $amountMultiply;

        return $this;
    }

    public function getAmountWrongMultiply(): ?int
    {
        return $this->amountWrongMultiply;
    }

    public function setAmountWrongMultiply(?int $amountWrongMultiply): self
    {
        $this->amountWrongMultiply = $amountWrongMultiply;

        return $this;
    }

    public function getAmountDivide(): ?int
    {
        return $this->amountDivide;
    }

    public function setAmountDivide(?int $amountDivide): self
    {
        $this->amountDivide = $amountDivide;

        return $this;
    }

    public function getAmountWrongDivide(): ?int
    {
        return $this->amountWrongDivide;
    }

    public function setAmountWrongDivide(?int $amountWrongDivide): self
    {
        $this->amountWrongDivide = $amountWrongDivide;

        return $this;
    }
}
