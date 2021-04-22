<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\barang;

/**
 * BarangSearch represents the model behind the search form of `app\models\barang`.
 */
class BarangSearch extends barang
{
    /**
     * {@inheritdoc}
     */

    public $jenis;
    public $supplier;
    public function rules()
    {
        return [
            [['id', 'id_jenis', 'id_supplier', 'stok'], 'integer'],
            [['kode_barang', 'nama_barang', 'satuan'], 'safe'],
            [['harga'], 'number'],
            [['jenis', 'supplier'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = barang::find();

        // add conditions that should always apply here

        $query->joinWith(['jenis','supplier']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['jenis'] = [
            'asc' => ['jenis.nama_jenis' => SORT_ASC],
            'desc' => ['jenis.nama_jenis' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['supplier'] = [
            'asc' => ['supplier.nama_supplier' => SORT_ASC],
            'desc' => ['supplier.nama_supplier' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            //'id_jenis' => $this->id_jenis,
            //'id_supplier' => $this->id_supplier,
            'harga' => $this->harga,
            'stok' => $this->stok,
        ]);

        $query->andFilterWhere(['like', 'kode_barang', $this->kode_barang])
            ->andFilterWhere(['like', 'nama_barang', $this->nama_barang])
            ->andFilterWhere(['like', 'satuan', $this->satuan])
            ->andFilterWhere(['like', 'jenis.nama_jenis', $this->jenis])
            ->andFilterWhere(['like', 'supplier.nama_supplier', $this->supplier]);

        return $dataProvider;
    }
}
