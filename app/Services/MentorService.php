<?php

namespace App\Services;

use App\Enum\TypeEnum;
use App\Services\Traits\UploadTrait;
use App\Http\Requests\StoreMentorRequest;
use App\Contracts\Interfaces\MentorInterface;
use App\Contracts\Interfaces\MentorStudentInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Http\Requests\UpdateMentorRequest;
use App\Models\Mentor;
use Hash;

class MentorService
{
    use UploadTrait;

    private MentorInterface $mentor;
    private MentorStudentInterface $mentorStudent;
    private UserInterface $user;


    public function __construct(MentorInterface $mentor, MentorStudentInterface $mentorStudent, UserInterface $user)
    {
        $this->mentor = $mentor;
        $this->mentorStudent = $mentorStudent;
        $this->user = $user;
    }

    use UploadTrait;

    /**
     * Handle custom upload validation.
     *
     * @param string $disk
     * @param object $file
     * @param string|null $old_file
     * @return string
     */
    public function validateAndUpload(string $disk, object $file, string $old_file = null): string
    {
        if ($old_file) $this->remove($old_file);

        return $this->upload($disk, $file);
    }

    /**
     * Handle store data event to models.
     *
     * @param StoreSaleRequest $request
     *
     * @return array|bool
     */
    public function store(StoreMentorRequest $request): array|bool
    {
        $data = $request->validated();
        unset($data['division_id']);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $data['image'] = $request->file('image')->store(TypeEnum::MENTOR->value, 'public');
            return $data;
        }

        

        return false;
    }

    /**
     * Handle update data event to models.
     *
     * @param Sale $sale
     * @param UpdateSaleRequest $request
     *
     * @return array|bool
     */
    public function update(Mentor $mentor, UpdateMentorRequest $request): array|bool
    {
        $data = $request->validated();
        unset($data['division_id']);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $this->remove($mentor->image);
            $data['image'] = $request->file('image')->store(TypeEnum::MENTOR->value, 'public');
        } else {
            $data['image'] = $mentor->image;
        }

        $dataUser = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make('password'),
            'mentors_id' => $mentor->id,
        ];

        $this->user->update($mentor->id, $dataUser);

        return $data;
    }

    public function delete(Mentor $mentor)
    {
        $this->remove($mentor->image);
    }

}
