<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\PermissionInterface;
use App\Enum\StatusApprovalPermissionEnum;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionRepository extends BaseRepository implements PermissionInterface
{
    public function __construct(Permission $permission)
    {
        $this->model = $permission;
    }

    /**
     * getByStudent
     *
     * @param  mixed $studentId
     * @return mixed
     */
    public function getByStudent(mixed $studentId): mixed
    {
        return $this->model->query()
            ->where('student_id', $studentId)
            ->get();
    }

    /**
     * search
     *
     * @param  mixed $request
     * @return mixed
     */
    public function search(Request $request): mixed
    {
        return $this->model->query()
            ->when($request->status_approval == StatusApprovalPermissionEnum::AGREE->value, function ($query) {
                $query->where('status_approval', StatusApprovalPermissionEnum::AGREE->value);
            })
            ->when($request->status_approval == StatusApprovalPermissionEnum::REJECT->value, function ($query) {
                $query->where('status_approval', StatusApprovalPermissionEnum::REJECT->value);
            })
            ->when($request->status_approval == StatusApprovalPermissionEnum::PENDING->value, function ($query) {
                $query->where('status_approval', StatusApprovalPermissionEnum::PENDING->value);
            })
            ->get();
    }

    /**
     * getByStatus
     *
     * @param  mixed $status
     * @return mixed
     */
    public function getByStatus(string $status): mixed
    {
        return $this->model->query()
            ->where('status_approval', $status)
            ->get();
    }

    /**
     * get
     *
     * @return mixed
     */
    public function get(): mixed
    {
        return $this->model->query()
            ->get();
    }

    /**
     * store
     *
     * @param  mixed $data
     * @return mixed
     */
    public function store(array $data): mixed
    {
        return $this->model->query()
            ->create($data);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return mixed
     */
    public function show(mixed $id): mixed
    {
        return $this->model->query()
            ->findOrFail($id);
    }

    /**
     * update
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return mixed
     */
    public function update(mixed $id, array $data): mixed
    {
        return $this->show($id)
            ->update($data);
    }

    /**
     * delete
     *
     * @param  mixed $id
     * @return mixed
     */
    public function delete(mixed $id): mixed
    {
        return $this->show($id)
            ->delete();
    }
}