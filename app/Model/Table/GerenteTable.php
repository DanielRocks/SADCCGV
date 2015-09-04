<?php
namespace App\Model\Table;

use App\Model\Entity\Gerente;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Gerente Model
 *
 */
class GerenteTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('gerente');
        $this->displayField('IDgerente');
        $this->primaryKey('IDgerente');

    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('IDgerente', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('IDgerente', 'create');

        $validator
            ->add('IDfuncionario', 'valid', ['rule' => 'numeric'])
            ->requirePresence('IDfuncionario', 'create')
            ->notEmpty('IDfuncionario');

        return $validator;
    }
}
