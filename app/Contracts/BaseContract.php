<?php

namespace App\Contracts;

interface BaseContract
{
    /**
     * Create a model instance
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * Update a model instance
     * @param array $attributes
     * @param string $id
     * @return mixed
     */
    public function update(array $attributes, string $id);

    /**
     * Update a model instance
     * @param array $attributes
     * @param array $where
     * @return mixed
     */
    public function updateBy(array $attributes, array $where);

    /**
     * Return all model rows
     * @param array $columns
     * @param string $orderBy
     * @param string $sortBy
     * @return mixed
     */
    public function all($columns = array('*'), string $orderBy = 'id', string $sortBy = 'desc');

    /**
     * Find one by ID
     * @param string $id
     * @return mixed
     */
    public function find(string $id);

    /**
     * Find one by ID or throw exception
     * @param string $id
     * @return mixed
     */
    public function findOneOrFail(string $id);

    /**
     * Find based on a different column
     * @param array $data
     * @return mixed
     */
    public function findBy(array $data);

    /**
     * Find one based on a different column
     * @param array $data
     * @return mixed
     */
    public function findOneBy(array $data);

    /**
     * Find one based on a different column or through exception
     * @param array $data
     * @return mixed
     */
    public function findOneByOrFail(array $data);

    /**
     * Delete one by Id
     * @param string $id
     * @return mixed
     */
    public function delete(string $id);
}
