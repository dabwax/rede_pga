<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 *
 * Temos 4 tipos de gráficos:
 * *
 * a) Barra
 *
 * O Axis-X são as matérias.
 * Cada input é uma série.
 * É necessário dividir o total do input na matéria pelo total da matéria e multiplicar por 100 (para receber a porcentagem).
 *
 * No gráfico de barra, é necessário escolher se:
 * a.1) Será de porcentagem:
 * a.2) Será empilhado:
 * b) Coluna
 * c) Linha
 * d) Pizza
 */

/**
 * Chart Entity.
 */
class Chart extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

    public function initFrontEnd()
    {
    	$init = [
			'options' => [
				'chart' => [
					'type' => $this->type
				],
			],
			'series' => [
				[
					'name' => 'Horário da Cagada - 15:00h',
					'data' => [
						[
							'name' => "Geral",
							'y' => 1
						],
					]
				],
				[
					'name' => 'Horário da Cagada - 16:00h',
					'data' => [
						[
							'name' => "Geral",
							'y' => 2
						],
						[
							'name' => "Matemática",
							'y' => 2
						],
						[
							'name' => "Biologia",
							'y' => 5
						],
					]
				]
			],
			'title' => [
				'text' => $this->name
			],
			'xAxis' => [
                'type' => 'datetime',
				'categories' => ['Geral', 'Biologia', 'Matemática'],
			],
			'yAxis' => [
				'title' => ['text' => 'Eixo Y'],
			]
		];

		return $init;
    }

    // Determina o valor total de cada input
    public function getTotalByInput($lessons)
    {
        $inputs = array_flip($this->getSeries());

        if($this->type == "numero_absoluto")
        {
            // 1 - Itera as aulas
            foreach($lessons as $lesson)
            {
                // 2 - Itera as entradas da aula
                foreach($lesson->lesson_entries as $lesson_entry)
                {
                    // 3 - Verifica se o input da entrada está no array
                    // Se estiver, verifica se o input é do tipo número
                    // Se for do tipo número, acrescenta o valor dele
                    // Se for do tipo texto, acrescenta + 1

                    if(array_key_exists($lesson_entry->input->name, $inputs))
                    {
                        $numeric_types = ["escala_numerica", "numero"];

                        // É numérico
                        if(in_array($lesson_entry->input->type, $numeric_types))
                        {
                            $increment = $lesson_entry->value;
                        // É textual
                        } else {
                            $increment = 1;
                        }

                        $inputs[$lesson_entry->input->name] = @$inputs[$lesson_entry->input->name] + $increment;
                    }
                }

            }

            // média
            if($this->use_media == 1)
            {
                foreach($inputs as $key => $value)
                {
                    $inputs[$key] = floor($value / $this->total_lessons);
                }
            }
        }

        if($this->type == "line")
        {
            // 1 - Itera as aulas
            foreach($lessons as $lesson)
            {
                // 2 - Itera as entradas da aula
                foreach($lesson->lesson_entries as $lesson_entry)
                {
                    // 3 - Verifica se o input da entrada está no array
                    // Se estiver, verifica se o input é do tipo número
                    // Se for do tipo número, acrescenta o valor dele
                    // Se for do tipo texto, acrescenta + 1

                    if(array_key_exists($lesson_entry->input->name, $inputs))
                    {
                        $numeric_types = ["escala_numerica", "numero"];

                        // É numérico
                        if(in_array($lesson_entry->input->type, $numeric_types))
                        {
                            $increment = $lesson_entry->value;
                        // É textual
                        } else {
                            $increment = 1;
                        }

                        $inputs[$lesson_entry->input->name] = @$inputs[$lesson_entry->input->name] + $increment;
                    }
                }
            }

            // média
            if($this->use_media == 1)
            {
                foreach($inputs as $key => $value)
                {
                    $inputs[$key] = floor($value / $this->total_lessons);
                }
            }
        }

        if($this->type == "column" || $this->type == "bar")
        {
            // 1 - Itera as aulas
            foreach($lessons as $lesson)
            {
                // 2 - Itera as entradas da aula
                foreach($lesson->lesson_entries as $lesson_entry)
                {
                    // 3 - Verifica se o input da entrada está no array
                    // Se estiver, verifica se o input é do tipo número
                    // Se for do tipo número, acrescenta o valor dele
                    // Se for do tipo texto, acrescenta + 1

                    if(array_key_exists($lesson_entry->input->name, $inputs))
                    {
                        $numeric_types = ["escala_numerica", "numero"];

                        // É numérico
                        if(in_array($lesson_entry->input->type, $numeric_types))
                        {
                            $increment = $lesson_entry->value;
                        // É textual
                        } else {
                            $increment = 1;
                        }

                        $inputs[$lesson_entry->input->name] = @$inputs[$lesson_entry->input->name] + $increment;
                    }
                }
            }


            // média
            if($this->use_media == 1)
            {
                foreach($inputs as $key => $value)
                {
                    $inputs[$key] = floor($value / $this->total_lessons);
                }
            }
        }

        if($this->type == "pie" || $this->type == "donut")
        {
            foreach($inputs as $k => $v)
            {
                $inputs[$k] = [];
            }

            // 1 - Itera as aulas
            foreach($lessons as $lesson)
            {
                // 2 - Itera as entradas da aula
                foreach($lesson->lesson_entries as $lesson_entry)
                {
                    // 3 - Verifica se o input da entrada está no array
                    // Se estiver, verifica se o input é do tipo número
                    // Se for do tipo número, acrescenta o valor dele
                    // Se for do tipo texto, acrescenta + 1

                    if(array_key_exists($lesson_entry->input->name, $inputs))
                    {
                        $numeric_types = ["escala_numerica", "numero"];

                        // É numérico
                        if(in_array($lesson_entry->input->type, $numeric_types))
                        {
                            $increment = $lesson_entry->value;
                        // É textual
                        } else {
                            $increment = 1;
                        }

                        foreach($lesson->lesson_themes as $lesson_theme)
                        {
                            $inputs[$lesson_entry->input->name][$lesson_theme->theme->name] = @$inputs[$lesson_entry->input->name][$lesson_theme->theme->name] + $increment;
                    
                        }
                    }
                }
            }


            // média
            if($this->use_media == 1)
            {
                foreach($inputs as $key => $value)
                {
                    foreach($inputs[$key] as $key2 => $value2)
                    {
                        $inputs[$key][$key2] = floor($value2 / $this->total_lessons);
                    }
                }
            }
        }

        return $inputs;
    }

    // Determina o valor total de cada matéria
    public function getTotalByTheme($lessons)
    {
        $inputs = array_values($this->getSeries());

        // Gambiarra - limpa o array
        foreach($inputs as $k => $v)
        {
            unset($inputs[$k]);

            $inputs[$v] = [];
        }

        // 1 - Itera as aulas
        foreach($lessons as $lesson)
        {
            // 2 - Itera as entradas da aula
            foreach($lesson->lesson_entries as $lesson_entry)
            {
                // 3 - Verifica se o input da entrada está no array
                // Se estiver, verifica se o input é do tipo número
                // Se for do tipo número, acrescenta o valor dele
                // Se for do tipo texto, acrescenta + 1

                if(array_key_exists($lesson_entry->input->name, $inputs))
                {
                    $numeric_types = ["escala_numerica", "numero"];

                    // É numérico
                    if(in_array($lesson_entry->input->type, $numeric_types))
                    {
                        $increment = floatval($lesson_entry->value);
                    // É textual
                    } else {
                        $increment = 1;
                    }

                    // 4 - Se a aula tiver matéria, soma para cada matéria e para Geral
                    // Se a aula não tiver matéria, soma somente para Geral
                    if(!empty($lesson->lesson_themes))
                    {
                        foreach($lesson->lesson_themes as $lesson_theme)
                        {
                            $inputs[$lesson_entry->input->name][$lesson_theme->theme->name] = @$inputs[$lesson_entry->input->name][$lesson_theme->theme->name] + $increment;
                        }

                        $inputs[$lesson_entry->input->name]["Geral"] = @$inputs[$lesson_entry->input->name]["Geral"] + $increment;
                    } else {
                        $inputs[$lesson_entry->input->name]["Geral"] = @$inputs[$lesson_entry->input->name]["Geral"] + $increment;
                    }

                }
            }
        }

        return $inputs;
    }

    // Determina o valor total de cada mês
    public function getTotalByMonth($lessons)
    {
        $inputs = [
            'Jan' => [],
            'Fev' => [],
            'Mar' => [],
            'Abr' => [],
            'Mai' => [],
            'Jun' => [],
            'Jul' => [],
            'Ago' => [],
            'Set' => [],
            'Out' => [],
            'Nov' => [],
            'Dez' => [],
        ];

        $series = $this->getSeries();

        foreach($inputs as $key => $value)
        {
            foreach($series as $key2 => $value2)
            {
                if(empty($inputs[$key][$value2]))
                {
                    $inputs[$key][$value2] = 0;
                }
            }
        }

        // 1 - Itera as aulas
        foreach($lessons as $lesson)
        {
            // 2 - Itera as entradas da aula
            foreach($lesson->lesson_entries as $lesson_entry)
            {
                // 3 - Verifica se o input da entrada está no array
                // Se estiver, verifica se o input é do tipo número
                // Se for do tipo número, acrescenta o valor dele
                // Se for do tipo texto, acrescenta + 1

                    $numeric_types = ["escala_numerica", "numero"];

                    // É numérico
                    if(in_array($lesson_entry->input->type, $numeric_types))
                    {
                        $increment = floatval($lesson_entry->value);
                    // É textual
                    } else {
                        $increment = 1;
                    }

                    setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                    date_default_timezone_set('America/Sao_Paulo');

                    $mes = strftime( '%B', $lesson->date -> getTimestamp() );
                    $mes = ucfirst(substr($mes, 0, 3));

                    if(!empty($this->chart_themes))
                    {
                        $chart_themes = [];
                        $lesson_themes = [];

                        foreach ($this->chart_themes as $key => $value) {
                            if(!in_array($value->theme_id, $chart_themes))
                            {
                                $chart_themes[] = $value->theme_id;
                            }
                        }

                        foreach ($lesson->lesson_themes as $key => $value) {
                            if(!in_array($value->theme_id, $lesson_themes))
                            {
                                $lesson_themes[] = $value->theme_id;
                            }
                        }

                        $lesson_count_to_chart = false;

                        foreach($lesson_themes as $lt)
                        {
                            if(in_array($lt, $chart_themes))
                            {
                                $lesson_count_to_chart = true;
                            }
                        }

                        if($lesson_count_to_chart)
                        {
                            $inputs[$mes][$lesson_entry->input->name] = @$inputs[$mes][$lesson_entry->input->name] + $increment;
                        }

                    } else {
                        $inputs[$mes][$lesson_entry->input->name] = @$inputs[$mes][$lesson_entry->input->name] + $increment;
                    }
            }
        }

        return $inputs;
    }

    // Determina as séries do gráfico
    // Se for de coluna, são os inputs
    public function getSeries()
    {
        $series = [];

        if(empty($this->chart_inputs))
        {
            throw new \Exception("Não há inputs para o gráfico.");
        }

        // 1 - Se o gráfico for de linha, são os inputs
        if($this->type == "numero_absoluto")
        {

            // 2 - Itera os inputs do gráfico
            foreach($this->chart_inputs as $ci)
            {

                // 3 - Verifica se o input já foi incluído como série
                if(!in_array($ci->input->name, $series))
                {
                    $series[] = $ci->input->name;
                }
            }
        }

        // 1 - Se o gráfico for de linha, são os inputs
        if($this->type == "line")
        {

            // 2 - Itera os inputs do gráfico
            foreach($this->chart_inputs as $ci)
            {

                // 3 - Verifica se o input já foi incluído como série
                if(!in_array($ci->input->name, $series))
                {
                    $series[] = $ci->input->name;
                }
            }
        }

        // 1 - Se o gráfico for de coluna, são os inputs
        if($this->type == "column" || $this->type == "bar")
        {

            // 2 - Itera os inputs do gráfico
            foreach($this->chart_inputs as $ci)
            {

                // 3 - Verifica se o input já foi incluído como série
                if(!in_array($ci->input->name, $series))
                {
                    $series[] = $ci->input->name;
                }
            }
        }

        // 1 - Se o gráfico for de coluna, são os inputs
        if($this->type == "pie" || $this->type == "donut")
        {

            // 2 - Itera os inputs do gráfico
            foreach($this->chart_inputs as $ci)
            {

                // 3 - Verifica se o input já foi incluído como série
                if(!in_array($ci->input->name, $series))
                {
                    $series[] = $ci->input->name;
                }
            }
        }

        return $series;
    }

    // Determinar as categorias do eixo X (São as matérias)
    // Se for de linha, são os meses
    // Se for de coluna, são as matérias
    public function getCategories()
    {
        $categories = [];

        // 1 - Se o gráfico for de linha, são as matérias
        if($this->type == "line")
        {

            $categories = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];

            return $categories;
        }

        // 1 - Se o gráfico for de coluna, são as matérias
        if($this->type == "column" || $this->type == "bar")
        {
            // 2 - Inclui Geral por padrão (o gráfico não precisa ter matérias)
            $categories[] = 'Geral';

            // 3 - Inclui as matérias do gráfico na variável de categorias
            foreach($this->chart_themes as $ct)
            {
                // 4 - Se a matéria ainda não tiver sido listada como categoria
                // inclui ela
                if(!in_array($ct->theme->name, $categories))
                {
                    $categories[] = $ct->theme->name;
                }
            }
        }

        // 1 - Se o gráfico for de coluna, são as matérias
        if($this->type == "pie" || $this->type == "donut")
        {
            // 2 - Inclui Geral por padrão (o gráfico não precisa ter matérias)
            $categories[] = 'Geral';

            // 3 - Inclui as matérias do gráfico na variável de categorias
            foreach($this->chart_themes as $ct)
            {
                // 4 - Se a matéria ainda não tiver sido listada como categoria
                // inclui ela
                if(!in_array($ct->theme->name, $categories))
                {
                    $categories[] = $ct->theme->name;
                }
            }
        }

        return $categories;
    }
}
