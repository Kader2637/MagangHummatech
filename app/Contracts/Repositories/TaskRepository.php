<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\TaskInterface;
use App\Models\Task;

class TaskRepository extends BaseRepository implements TaskInterface
{
    public function __construct(Task $task)
    {
        $this->model = $task;
    }
    public function filterByStatus(?string $id): mixed
    {
        return $this->model->query()->when($id, function($q) use ($id) {
            return $q->whereHas('submissions', function($query) use ($id) {
                $query->where('status', $id);
            });
        });
    }

    public function getTaskBySubcourse(int $id): mixed
    {
        return $this->model->query()->where('sub_course_id', $id)->get();
    }

    public function getId(int $id): mixed
    {
        return $this->model->query()->findOrFail($id);
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
    public function getUnsubmittedTasks()
    {
        return $this->model->query()->whereDoesntHave('studentTasks', function($query) {
            $query->where('student_id', auth()->user()->student->id);
        })->get();
    }
    public function whereSubCourse(mixed $id): mixed
    {
        return $this->model->query()->where('sub_course_id', $id)->get();
    }
}
