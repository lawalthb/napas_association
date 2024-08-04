<?php 

namespace App\Exports;
use App\Models\Transactions;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class TransactionsMemberViewExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
	protected $query;

	protected $rec_id;

    public function __construct($query, $rec_id)
    {
        $this->query = $query->select(Transactions::exportMemberViewFields());
        $this->rec_id = $rec_id;
    }


    public function query()
    {
        return $this->query->where("id", $this->rec_id);
    }


	public function headings(): array
    {
        return [
			'Receipt No',
			'Reference',
			'Fullname',
			'Email',
			'Price Settings',
			'Amount',
			'Phone Number',
			'Created At',
			'Status',
			'Payment Link'
        ];
    }


    public function map($record): array
    {
        return [
			$record->id,
			$record->reference,
			$record->fullname,
			$record->email,
			$record->price_settings_id,
			$record->amount,
			$record->phone_number,
			$record->created_at,
			$record->status,
			$record->authorization_url
        ];
    }
}
