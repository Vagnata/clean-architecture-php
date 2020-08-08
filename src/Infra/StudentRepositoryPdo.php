<?php

namespace Alura\Arquitetura\Infra;


use Alura\Arquitetura\Domain\Cpf;
use Alura\Arquitetura\Domain\Student\Phone;
use Alura\Arquitetura\Domain\Student\Student;
use Alura\Arquitetura\Domain\Student\StudentNotFoundException;
use Alura\Arquitetura\Domain\Student\StudentRepository;
use PDO;

class StudentRepositoryPdo implements StudentRepository
{
    /**
     * @var \PDO
     */
    private $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(Student $student): void
    {
        $sql       = 'INSERT INTO students VALUES (:cpf, :name, :email)';
        $statement = $this->connection->prepare($sql);
        $statement->bindValue('cpf', $student->getCpf());
        $statement->bindValue('name', $student->getName());
        $statement->bindValue('email', $student->getEmail());
        $statement->execute();

        /** @var $phone Phone */
        $sql = 'INSERT INTO phones VALUES (:area_code, :number, :student_cpf)';
        $this->connection->prepare($sql);
        $statement->bindValue('student_cpf', $student->getCpf());
        foreach ($student->getPhones() as $phone) {
            $statement->bindValue('area_code', $phone->getAreaCode());
            $statement->bindValue('number', $phone->getNumber());
            $statement->execute();
        }
    }

    public function findByCpf(Cpf $cpf): Student
    {
        $sql = '
            SELECT cpf, name, email, area_code, number as phone_number FROM students
             LEFT JOIN  phones on students.cpf = phones.student_cpf
            WHERE students.cpf = ?
        ';
        $statement = $this->connection->prepare($sql);
        $statement->bindValue(1, (string) $cpf);
        $statement->execute();

        $studentData = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (!count($studentData)) {
            throw new StudentNotFoundException($cpf);
        }

        return $this->mapStudent($studentData);
    }

    public function findAll(): array
    {
        $sql = 'SELECT cpf, name, email, area_code, number as phone_number FROM students
                  LEFT JOIN phones on students.cpf = phones.student_cpf';

        $statement = $this->connection->prepare($sql);
        $statement->execute();

        $dataList = $statement->fetchAll(PDO::FETCH_ASSOC);
        $students = [];

        foreach ($dataList as $data) {
            if (!array_key_exists($data['cpf'], $students)) {
                $students[$data['cpf']] = Student::withCpfNameAndEmail($data['cpf'], $data['name'], $data['email']);
            }

            $students[$data['cpf']]->addPhoneNumber($data['area_code'], $data['number']);
        }

        return array_values($students);
    }

    private function mapStudent(array $studentData): Student
    {
        $firstLine = current($studentData);
        $student = Student::withCpfNameAndEmail($firstLine['cpf'], $firstLine['name'], $firstLine['email']);
        $phones = array_filter($studentData, function ($line) {
            return !is_null($line['area_code']) && !is_null($line['number']);
        });

        foreach ($phones as $phone) {
            $student->addPhoneNumber($phone['area_code'], $phone['number']);
        }

        return $student;
    }
}
