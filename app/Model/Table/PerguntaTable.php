<?php
namespace App\Model\Table;

use App\Model\Entity\Perguntum;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pergunta Model
 *
 */
class PerguntaTable extends Table
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

        $this->table('pergunta');
        $this->displayField('IDpergunta');
        $this->primaryKey('IDpergunta');

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
            ->add('IDpergunta', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('IDpergunta', 'create');

        $validator
            ->add('IDquestionario', 'valid', ['rule' => 'numeric'])
            ->requirePresence('IDquestionario', 'create')
            ->notEmpty('IDquestionario');

        $validator
            ->requirePresence('pergunta', 'create')
            ->notEmpty('pergunta');

        return $validator;
    }
}
