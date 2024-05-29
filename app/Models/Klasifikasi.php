<?php

namespace App\Models;

use Rubix\ML\PersistentModel;
use Rubix\ML\Persisters\Filesystem;
use Rubix\ML\Datasets\Labeled;
use Rubix\ML\Classifiers\ClassificationTree;
use Carbon\Carbon;

class Klasifikasi
{
    public static function trainAndSaveModel()
    {
        // Jalur penyimpanan model
        $savePath = storage_path('app/models/hasil.rbx');

        // Definisikan variabel $labels dengan kategori usia tanpa tahun
        $labels = [
            'Usia Taruna', 'Usia Taruna', 'Usia Taruna', 'Usia Taruna', 'Usia Taruna',
            'Usia Taruna', 'Usia Taruna', 'Usia Taruna', 'Usia Taruna', 'Usia Taruna',
            'Usia Remaja', 'Usia Remaja', 'Usia Remaja', 'Usia Remaja', 'Usia Remaja',
            'Usia Remaja', 'Usia Remaja', 'Usia Remaja', 'Usia Remaja', 'Usia Remaja',
            'Usia Pemula', 'Usia Pemula', 'Usia Pemula', 'Usia Pemula', 'Usia Pemula',
            'Usia Pemula', 'Usia Pemula', 'Usia Pemula', 'Usia Pemula', 'Usia Pemula',
            'Usia Anak', 'Usia Anak', 'Usia Anak', 'Usia Anak', 'Usia Anak',
            'Usia Anak', 'Usia Anak', 'Usia Anak', 'Usia Anak', 'Usia Anak',
            'Usia Dini', 'Usia Dini', 'Usia Dini', 'Usia Dini', 'Usia Dini',
            'Usia Dini', 'Usia Dini', 'Usia Dini', 'Usia Dini', 'Usia Dini',
            'Usia Pradini', 'Usia Pradini', 'Usia Pradini', 'Usia Pradini', 'Usia Pradini',
            'Usia Pradini', 'Usia Pradini', 'Usia Pradini', 'Usia Pradini',
        ];

        // Data latih sesuai dengan rentang usia di kategori
        $samples = [
            [17, 'Laki-Laki', 'Agus'], [17, 'Laki-Laki', 'Budi'], [17, 'Laki-Laki', 'Cici'],
            [17, 'Laki-Laki', 'Dedi'], [17, 'Laki-Laki', 'Euis'], [17, 'Laki-Laki', 'Fajar'],
            [16, 'Laki-Laki', 'Gina'], [16, 'Laki-Laki', 'Hani'], [16, 'Laki-Laki', 'Ina'],
            [16, 'Laki-Laki', 'Jeni'], [15, 'Laki-Laki', 'Gita'], [15, 'Laki-Laki', 'Hadi'],
            [15, 'Laki-Laki', 'Indra'], [15, 'Laki-Laki', 'Joko'], [15, 'Perempuan', 'Kiki'],
            [15, 'Perempuan', 'Lina'], [14, 'Laki-Laki', 'Mira'], [14, 'Laki-Laki', 'Nana'],
            [14, 'Laki-Laki', 'Oky'], [14, 'Laki-Laki', 'Putri'], [13, 'Laki-Laki', 'Rina'],
            [13, 'Laki-Laki', 'Sari'], [13, 'Laki-Laki', 'Toni'], [13, 'Laki-Laki', 'Umi'],
            [13, 'Laki-Laki', 'Vivi'], [12, 'Laki-Laki', 'Wina'], [12, 'Laki-Laki', 'Xena'],
            [12, 'Laki-Laki', 'Yayan'], [12, 'Laki-Laki', 'Zara'], [11, 'Laki-Laki', 'Abdi'],
            [11, 'Perempuan', 'Bima'], [11, 'Perempuan', 'Citra'], [11, 'Perempuan', 'Dona'],
            [11, 'Perempuan', 'Eka'], [10, 'Perempuan', 'Fina'], [10, 'Perempuan', 'Gina'],
            [10, 'Laki-Laki', 'Hani'], [10, 'Laki-Laki', 'Ina'], [9, 'Laki-Laki', 'Jeni'],
            [9, 'Laki-Laki', 'Karin'], [9, 'Laki-Laki', 'Lina'], [9, 'Laki-Laki', 'Mina'],
            [8, 'Laki-Laki', 'Nina'], [8, 'Laki-Laki', 'Ona'], [8, 'Laki-Laki', 'Pina'],
            [8, 'Laki-Laki', 'Qina'], [7, 'Laki-Laki', 'Rina'], [7, 'Laki-Laki', 'Sina'],
            [7, 'Perempuan', 'Tina'], [7, 'Perempuan', 'Uina'], [6, 'Perempuan', 'Vina'],
            [6, 'Laki-Laki', 'Wina'], [6, 'Laki-Laki', 'Xina'], [6, 'Laki-Laki', 'Yina'],
            [5, 'Laki-Laki', 'Zina'], [5, 'Laki-Laki', 'Abby'], [5, 'Laki-Laki', 'Boby'],
            [5, 'Laki-Laki', 'Cory'], [5, 'Laki-Laki', 'Dory']
        ];

        // Langkah 1: Muat dataset
        $dataset = new Labeled($samples, $labels);

        // Langkah 2: Inisialisasi dan latih model dengan Decision Tree
        $classifier = new ClassificationTree();
        $classifier->train($dataset);

        // Simpan model yang dilatih untuk penggunaan nanti
        $model = new PersistentModel(
            $classifier,
            new Filesystem($savePath)
        );
        $model->save();

        // Simpan label untuk penggunaan nanti
        file_put_contents(storage_path('app/models/hasil.rbx.labels'), serialize($labels));

        return 'Model telah dilatih dan disimpan.';
    }
}
