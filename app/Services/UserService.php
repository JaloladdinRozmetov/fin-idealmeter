<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllUsers()
    {
        return $this->userRepository->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getUserById($id)
    {
        return $this->userRepository->find($id);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function createUser($data)
    {
        return $this->userRepository->create($data);
    }

    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function updateUser($id, $data)
    {
        return $this->userRepository->update($id, $data);
    }

    /**
     * @param $id
     * @return int
     */
    public function deleteUser($id)
    {
        return $this->userRepository->delete($id);
    }
}
