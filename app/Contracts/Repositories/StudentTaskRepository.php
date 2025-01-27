<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\StudentTaskInterface;
use App\Enum\TaskStatusEnum;
use App\Models\StudentTask;

class StudentTaskRepository extends BaseRepository implements StudentTaskInterface
{
    public function __construct(StudentTask $studentTask)
    {
        $this->model = $studentTask;
    }

    public function get(): mixed
    {
        return $this->model->query()->get();
    }
    public function store(array $data): mixed
    {
        return $this->model->query()->create($data);
    }
    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()->findOrFail($id)->update($data);
    }
    public function delete(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id)->delete($id);
    }
    public function getByStatus(string $status): mixed
    {
        return $this->model->query()->where('status', $status)->get();
    }
    public function whereTask(mixed $id) : mixed
    {
        return $this->model->query()->where('task_id', $id)->get();
    }
    public function whereTaskPending(mixed $student):mixed 
    {
        return $this->model->query()->where('student_id', $student)->where('status', TaskStatusEnum::PENDING->value)->get();
    }
    public function whereTaskDone(mixed $student):mixed 
    {
        return $this->model->query()->where('student_id', $student)->where('status', TaskStatusEnum::COMPLETED->value)->get();
    }
}
