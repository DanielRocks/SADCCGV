<?php
namespace App\Model\Table;

use App\Model\Entity\Questionario;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Questionario Model
 *
 */
class QuestionarioTable extends Table
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

        $this->table('questionario');
        $this->displayField('IDquestionario');
        $this->primaryKey('IDquestionario');

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
            ->add('IDquestionario', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('IDquestionario', 'create');

        $validator
            ->add('IDfuncionario', 'valid', ['rule' => 'numeric'])
            ->requirePresence('IDfuncionario', 'create')
            ->notEmpty('IDfuncionario');

        $validator
            ->requirePresence('titulo', 'create')
            ->notEmpty('titulo');

        return $validator;
    }
}
