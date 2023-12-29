<?php

namespace App\DataTables;

use App\Models\Expediente;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ExpedientesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            // ->addColumn('action', 'expedientes.action')

            ->addColumn('TIPO', function ($row) {

                return $row->tipo->nombre;
            })
            ->addColumn('USER', function ($row) {

                return $row->user->name;
            })
            ->filterColumn('USER', function ($query, $keyword) {
                $query->whereHas('user', function ($query) use ($keyword) {
                    $query->where('name', 'like', '%' . $keyword . '%');
                });
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Expediente $model): QueryBuilder
    {
        $query = $model->newQuery();

        // Verifica si hay un término de búsqueda y no está vacío
        if ($this->request->filled('search.value')) {
            $query->orderBy('fecha_ingreso', 'asc');
        } else {
            // Ordena por ID si no hay búsqueda
            $query->orderBy('id', 'asc');
        }

        return $query;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->parameters(
                [
                    "language" => ["url" => asset("datatables/es-ES.json")],
                ]
            )
            ->setTableId('expedientes-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            // ->selectStyleSingle()
            ->buttons([
                Button::make(''),
                Button::make('excel'),
                // Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            // Column::computed('action')
            //     ->exportable(false)
            //     ->printable(false)
            //     ->width(60)
            //     ->addClass('text-center'),

            Column::make('id')
            ->searchPanes(false),
            Column::make('TIPO')->title("TIPO")->width("60") ->searchPanes(false),
            // Column::make('tipo_id'),
            Column::make('n_expediente')->title('N° EXPEDIENTE'),
            Column::make('USER')->title("NOMBRE INTERNO/ASISTIDO")->width("220")->searchable(),
            Column::make('delito')->title('DELITO')->searchPanes(false),
            Column::make('fecha_sentencia')->title('FECHA SENTENCIA'),
            Column::make('pena')->title('PENA')->searchPanes(false),
            Column::make('fecha_ingreso')->title('FECHA INGRESO'),
            Column::make('observaciones')->title('OBSERVACIONES')->searchPanes(false),
            Column::make('penas_accesorias')->title('PENAS ACCESORIAS')->searchPanes(false),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Expedientes_' . date('YmdHis');
    }
}
