<?php

namespace App\Models;

class UrlTagsDataModel extends BaseModel
{
    protected $DBGroup          = 'default';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'url_id',
        'tag_id',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    protected function initialize(): void
    {
        parent::initialize();

        $this->table = $this->dbtables['urltagsdata'];
    }

    /**
     * This function get the url tags for $urlid
     *
     * @param mixed $urlid
     *
     * @return array
     */
    public function getUrlTags($urlid)
    {
        $this->where('url_id', $urlid);
        $this->select('tag_id');

        return $this->findAll();
    }

    public function delUrlTags($urlId)
    {
        return $this->where('url_id', $urlId)->delete();
    }
}