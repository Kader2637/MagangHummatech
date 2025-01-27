<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\CountInterface;
use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\GetWhereInterface;
use App\Contracts\Interfaces\Eloquent\SearchInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;

interface CourseInterface extends GetInterface, StoreInterface, DeleteInterface, UpdateInterface, ShowInterface, CountInterface, GetWhereInterface, SearchInterface
{
    public function getPaid();
    public function getUnpaidCourse();
    public function getCourseByStatus(string $status): mixed;
    public function whereDivision(mixed $id);

    /**
     * getNonactiveCourse
     *
     * @param  mixed $divisionId
     * @param  mixed $studentId
     * @return void
     */
    public function getNonactiveCourse(mixed $divisionId, mixed $studentId);
}
