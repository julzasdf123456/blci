<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class PaymentOrder
 * @package App\Models
 * @version June 1, 2023, 9:25 am PST
 *
 * @property string $ServiceConnectionId
 * @property number $MaterialDeposit
 * @property number $TransformerRentalFees
 * @property number $Apprehension
 * @property number $OverheadExpenses
 * @property number $CIAC
 * @property number $ServiceFee
 * @property number $CustomerDeposit
 * @property number $MeterQuantity
 * @property number $MeterUnitPrice
 * @property number $MeterAmount
 * @property number $TwistedWire6Quantity
 * @property number $TwistedWire6UnitPrice
 * @property number $TwistedWire6Amount
 * @property number $StrandedWire8Quantity
 * @property number $StrandedWire8UnitPrice
 * @property number $StrandedWire8Amount
 * @property number $SaleOfItemsQuantity
 * @property number $SaleOfItemsUnitPrice
 * @property number $SaleOfItemsAmount
 * @property number $CompressionTapQuantity
 * @property number $CompressionTapUnitPrice
 * @property number $CompressionTapAmount
 * @property number $PlyboardQuantity
 * @property number $PlyboardUnitPrice
 * @property number $PlyboardAmount
 * @property number $StainlessBuckleQuantity
 * @property number $StainlessBuckleUnitPrice
 * @property number $StainlessBuckleAmount
 * @property number $ElectricalTapeQuantity
 * @property number $ElectricalTapeUnitPrice
 * @property number $ElectricalTapeAmount
 * @property number $StainlessStrapQuantity
 * @property number $StainlessStrapUnitPrice
 * @property number $StainlessStrapAmount
 * @property number $MetalWoodScrewQuantity
 * @property number $MetalWoodScrewUnitPrice
 * @property number $MetalWoodScrewAmount
 * @property number $TotalSales
 * @property number $Others
 * @property number $LocalFTax
 * @property number $SubTotal
 * @property number $VAT
 * @property number $OthersTotal
 * @property number $OverAllTotal
 * @property string $ORNumber
 * @property string $ORDate
 * @property string $Notes
 */
class PaymentOrder extends Model
{
    // use SoftDeletes;

    use HasFactory;

    public $table = 'CRM_PaymentOrder';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'id';

    public $incrementing = false;

    public $fillable = [
        'id',
        'ServiceConnectionId',
        'MaterialDeposit',
        'TransformerRentalFees',
        'Apprehension',
        'OverheadExpenses',
        'CIAC',
        'ServiceFee',
        'CustomerDeposit',
        'MeterQuantity',
        'MeterUnitPrice',
        'MeterAmount',
        'TwistedWire6Quantity',
        'TwistedWire6UnitPrice',
        'TwistedWire6Amount',
        'StrandedWire8Quantity',
        'StrandedWire8UnitPrice',
        'StrandedWire8Amount',
        'SaleOfItemsQuantity',
        'SaleOfItemsUnitPrice',
        'SaleOfItemsAmount',
        'CompressionTapQuantity',
        'CompressionTapUnitPrice',
        'CompressionTapAmount',
        'PlyboardQuantity',
        'PlyboardUnitPrice',
        'PlyboardAmount',
        'StainlessBuckleQuantity',
        'StainlessBuckleUnitPrice',
        'StainlessBuckleAmount',
        'ElectricalTapeQuantity',
        'ElectricalTapeUnitPrice',
        'ElectricalTapeAmount',
        'StainlessStrapQuantity',
        'StainlessStrapUnitPrice',
        'StainlessStrapAmount',
        'MetalWoodScrewQuantity',
        'MetalWoodScrewUnitPrice',
        'MetalWoodScrewAmount',
        'TotalSales',
        'Others',
        'LocalFTax',
        'SubTotal',
        'VAT',
        'OthersTotal',
        'OverAllTotal',
        'ORNumber',
        'ORDate',
        'Notes'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'ServiceConnectionId' => 'string',
        'MaterialDeposit' => 'decimal:2',
        'TransformerRentalFees' => 'decimal:2',
        'Apprehension' => 'decimal:2',
        'OverheadExpenses' => 'decimal:2',
        'CIAC' => 'decimal:2',
        'ServiceFee' => 'decimal:2',
        'CustomerDeposit' => 'decimal:2',
        'MeterQuantity' => 'decimal:2',
        'MeterUnitPrice' => 'decimal:2',
        'MeterAmount' => 'decimal:2',
        'TwistedWire6Quantity' => 'decimal:2',
        'TwistedWire6UnitPrice' => 'decimal:2',
        'TwistedWire6Amount' => 'decimal:2',
        'StrandedWire8Quantity' => 'decimal:2',
        'StrandedWire8UnitPrice' => 'decimal:2',
        'StrandedWire8Amount' => 'decimal:2',
        'SaleOfItemsQuantity' => 'decimal:2',
        'SaleOfItemsUnitPrice' => 'decimal:2',
        'SaleOfItemsAmount' => 'decimal:2',
        'CompressionTapQuantity' => 'decimal:2',
        'CompressionTapUnitPrice' => 'decimal:2',
        'CompressionTapAmount' => 'decimal:2',
        'PlyboardQuantity' => 'decimal:2',
        'PlyboardUnitPrice' => 'decimal:2',
        'PlyboardAmount' => 'decimal:2',
        'StainlessBuckleQuantity' => 'decimal:2',
        'StainlessBuckleUnitPrice' => 'decimal:2',
        'StainlessBuckleAmount' => 'decimal:2',
        'ElectricalTapeQuantity' => 'decimal:2',
        'ElectricalTapeUnitPrice' => 'decimal:2',
        'ElectricalTapeAmount' => 'decimal:2',
        'StainlessStrapQuantity' => 'decimal:2',
        'StainlessStrapUnitPrice' => 'decimal:2',
        'StainlessStrapAmount' => 'decimal:2',
        'MetalWoodScrewQuantity' => 'decimal:2',
        'MetalWoodScrewUnitPrice' => 'decimal:2',
        'MetalWoodScrewAmount' => 'decimal:2',
        'TotalSales' => 'decimal:2',
        'Others' => 'decimal:2',
        'LocalFTax' => 'decimal:2',
        'SubTotal' => 'decimal:2',
        'VAT' => 'decimal:2',
        'OthersTotal' => 'decimal:2',
        'OverAllTotal' => 'decimal:2',
        'ORNumber' => 'string',
        'ORDate' => 'date',
        'Notes' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ServiceConnectionId' => 'required|string|max:255',
        'MaterialDeposit' => 'nullable|numeric',
        'TransformerRentalFees' => 'nullable|numeric',
        'Apprehension' => 'nullable|numeric',
        'OverheadExpenses' => 'nullable|numeric',
        'CIAC' => 'nullable|numeric',
        'ServiceFee' => 'nullable|numeric',
        'CustomerDeposit' => 'nullable|numeric',
        'MeterQuantity' => 'nullable|numeric',
        'MeterUnitPrice' => 'nullable|numeric',
        'MeterAmount' => 'nullable|numeric',
        'TwistedWire6Quantity' => 'nullable|numeric',
        'TwistedWire6UnitPrice' => 'nullable|numeric',
        'TwistedWire6Amount' => 'nullable|numeric',
        'StrandedWire8Quantity' => 'nullable|numeric',
        'StrandedWire8UnitPrice' => 'nullable|numeric',
        'StrandedWire8Amount' => 'nullable|numeric',
        'SaleOfItemsQuantity' => 'nullable|numeric',
        'SaleOfItemsUnitPrice' => 'nullable|numeric',
        'SaleOfItemsAmount' => 'nullable|numeric',
        'CompressionTapQuantity' => 'nullable|numeric',
        'CompressionTapUnitPrice' => 'nullable|numeric',
        'CompressionTapAmount' => 'nullable|numeric',
        'PlyboardQuantity' => 'nullable|numeric',
        'PlyboardUnitPrice' => 'nullable|numeric',
        'PlyboardAmount' => 'nullable|numeric',
        'StainlessBuckleQuantity' => 'nullable|numeric',
        'StainlessBuckleUnitPrice' => 'nullable|numeric',
        'StainlessBuckleAmount' => 'nullable|numeric',
        'ElectricalTapeQuantity' => 'nullable|numeric',
        'ElectricalTapeUnitPrice' => 'nullable|numeric',
        'ElectricalTapeAmount' => 'nullable|numeric',
        'StainlessStrapQuantity' => 'nullable|numeric',
        'StainlessStrapUnitPrice' => 'nullable|numeric',
        'StainlessStrapAmount' => 'nullable|numeric',
        'MetalWoodScrewQuantity' => 'nullable|numeric',
        'MetalWoodScrewUnitPrice' => 'nullable|numeric',
        'MetalWoodScrewAmount' => 'nullable|numeric',
        'TotalSales' => 'nullable|numeric',
        'Others' => 'nullable|numeric',
        'LocalFTax' => 'nullable|numeric',
        'SubTotal' => 'nullable|numeric',
        'VAT' => 'nullable|numeric',
        'OthersTotal' => 'nullable|numeric',
        'OverAllTotal' => 'nullable|numeric',
        'ORNumber' => 'nullable|string|max:255',
        'ORDate' => 'nullable',
        'Notes' => 'nullable|string|max:2000',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
