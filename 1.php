<?php

function biodata()
{
    $obj = [
        "name" => "Wisnu Agastya",
        "address" => "Semarang, Jawa Tengah",
        "hobbies" => ["Makan", "Tidur", "Mandi"],
        "is_married" => false,
        "school" => [
            "highSchool" => "SMKN 7 Semarang",
            "university" => "UDINUS"
        ],
        "skills" => [
            [
                "name" => "PHP",
                "score" => 9
            ],
            [
                "name" => "python",
                "score" => 8
            ]
        ],
    ];

    return json_encode($obj);
}

echo biodata();
