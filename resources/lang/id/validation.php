<?php

// resources/lang/id/validation.php

return [
    'accepted'             => 'Kolom :attribute harus diterima.',
    'active_url'           => 'Kolom :attribute bukan URL yang valid.',
    'after'                => 'Kolom :attribute harus tanggal setelah :date.',
    'after_or_equal'       => 'Kolom :attribute harus tanggal setelah atau sama dengan :date.',
    'alpha'                => 'Kolom :attribute hanya boleh berisi huruf.',
    'alpha_dash'           => 'Kolom :attribute hanya boleh berisi huruf, angka, dan garis hubung.',
    'alpha_num'            => 'Kolom :attribute hanya boleh berisi huruf dan angka.',
    'array'                => 'Kolom :attribute harus berupa array.',
    'before'               => 'Kolom :attribute harus tanggal sebelum :date.',
    'before_or_equal'      => 'Kolom :attribute harus tanggal sebelum atau sama dengan :date.',
    'between'              => [
        'numeric' => 'Kolom :attribute harus antara :min dan :max.',
        'file'    => 'Kolom :attribute harus antara :min dan :max kilobytes.',
        'string'  => 'Kolom :attribute harus antara :min dan :max karakter.',
        'array'   => 'Kolom :attribute harus antara :min dan :max item.',
    ],
    'boolean'              => 'Kolom :attribute harus benar atau salah.',
    'confirmed'            => 'Konfirmasi :attribute tidak cocok.',
    'date'                 => 'Kolom :attribute bukan tanggal yang valid.',
    'date_equals'          => 'Kolom :attribute harus tanggal yang sama dengan :date.',
    'date_format'          => 'Kolom :attribute tidak cocok dengan format :format.',
    'different'            => 'Kolom :attribute dan :other harus berbeda.',
    'digits'               => 'Kolom :attribute harus :digits digit.',
    'digits_between'       => 'Kolom :attribute harus antara :min dan :max digit.',
    'dimensions'           => 'Kolom :attribute memiliki dimensi gambar yang tidak valid.',
    'distinct'             => 'Kolom :attribute memiliki nilai duplikat.',
    'email'                => 'Kolom :attribute harus alamat email yang valid.',
    'ends_with'            => 'Kolom :attribute harus diakhiri salah satu dari: :values',
    'exists'               => 'Kolom :attribute yang dipilih tidak valid.',
    'file'                 => 'Kolom :attribute harus berupa file.',
    'filled'               => 'Kolom :attribute harus memiliki nilai.',
    'gt'                   => [
        'numeric' => 'Kolom :attribute harus lebih besar dari :value.',
        'file'    => 'Kolom :attribute harus lebih besar dari :value kilobytes.',
        'string'  => 'Kolom :attribute harus lebih besar dari :value karakter.',
        'array'   => 'Kolom :attribute harus memiliki lebih dari :value item.',
    ],
    'gte'                  => [
        'numeric' => 'Kolom :attribute harus lebih besar dari atau sama dengan :value.',
        'file'    => 'Kolom :attribute harus lebih besar dari atau sama dengan :value kilobytes.',
        'string'  => 'Kolom :attribute harus lebih besar dari atau sama dengan :value karakter.',
        'array'   => 'Kolom :attribute harus memiliki :value item atau lebih.',
    ],
    'image'                => 'Kolom :attribute harus berupa gambar.',
    'in'                   => 'Kolom :attribute yang dipilih tidak valid.',
    'in_array'             => 'Kolom :attribute tidak ada dalam :other.',
    'integer'              => 'Kolom :attribute harus bilangan bulat.',
    'ip'                   => 'Kolom :attribute harus alamat IP yang valid.',
    'ipv4'                 => 'Kolom :attribute harus alamat IPv4 yang valid.',
    'ipv6'                 => 'Kolom :attribute harus alamat IPv6 yang valid.',
    'json'                 => 'Kolom :attribute harus JSON yang valid.',
    'lt'                   => [
        'numeric' => 'Kolom :attribute harus kurang dari :value.',
        'file'    => 'Kolom :attribute harus kurang dari :value kilobytes.',
        'string'  => 'Kolom :attribute harus kurang dari :value karakter.',
        'array'   => 'Kolom :attribute harus memiliki kurang dari :value item.',
    ],
    'lte'                  => [
        'numeric' => 'Kolom :attribute harus kurang dari atau sama dengan :value.',
        'file'    => 'Kolom :attribute harus kurang dari atau sama dengan :value kilobytes.',
        'string'  => 'Kolom :attribute harus kurang dari atau sama dengan :value karakter.',
        'array'   => 'Kolom :attribute tidak boleh memiliki lebih dari :value item.',
    ],
    'max'                  => [
        'numeric' => 'Kolom :attribute tidak boleh lebih dari :max.',
        'file'    => 'Kolom :attribute tidak boleh lebih dari :max kilobytes.',
        'string'  => 'Kolom :attribute tidak boleh lebih dari :max karakter.',
        'array'   => 'Kolom :attribute tidak boleh lebih dari :max item.',
    ],
    'mimes'                => 'Kolom :attribute harus berupa file berjenis: :values.',
    'mimetypes'            => 'Kolom :attribute harus berupa file berjenis: :values.',
    'min'                  => [
        'numeric' => 'Kolom :attribute harus minimal :min.',
        'file'    => 'Kolom :attribute harus minimal :min kilobytes.',
        'string'  => 'Kolom :attribute harus minimal :min karakter.',
        'array'   => 'Kolom :attribute harus minimal :min item.',
    ],
    'not_in'               => 'Kolom :attribute yang dipilih tidak valid.',
    'not_regex'            => 'Format :attribute tidak valid.',
    'numeric'              => 'Kolom :attribute harus berupa angka.',
    'password'             => 'Password salah.',
    'present'              => 'Kolom :attribute harus ada.',
    'regex'                => 'Format :attribute tidak valid.',
    'required'             => 'Kolom :attribute wajib diisi.',
    'required_if'          => 'Kolom :attribute wajib diisi bila :other adalah :value.',
    'required_unless'      => 'Kolom :attribute wajib diisi kecuali :other memiliki nilai :values.',
    'required_with'        => 'Kolom :attribute wajib diisi bila terdapat :values.',
    'required_with_all'    => 'Kolom :attribute wajib diisi bila terdapat :values.',
    'required_without'     => 'Kolom :attribute wajib diisi bila tidak terdapat :values.',
    'required_without_all' => 'Kolom :attribute wajib diisi bila tidak terdapat :values.',
    'same'                 => 'Kolom :attribute dan :other harus sama.',
    'size'                 => [
        'numeric' => 'Kolom :attribute harus berukuran :size.',
        'file'    => 'Kolom :attribute harus berukuran :size kilobyte.',
        'string'  => 'Kolom :attribute harus berukuran :size karakter.',
        'array'   => 'Kolom :attribute harus mengandung :size item.',
    ],
    'starts_with'          => 'Kolom :attribute harus diawali salah satu dari: :values',
    'string'               => 'Kolom :attribute harus berupa string.',
    'timezone'             => 'Kolom :attribute harus berupa zona waktu yang valid.',
    'unique'               => 'Kolom :attribute sudah digunakan.',
    'uploaded'             => 'Kolom :attribute gagal diunggah.',
    'url'                  => 'Format :attribute tidak valid.',
    'uuid'                 => 'Kolom :attribute harus UUID yang valid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        //
    ],
];


