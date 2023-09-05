<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class trashType extends Model
{
    use HasFactory;

    public function lieux()
    {
        return $this->belongsToMany(Lieu::class, 'lieu_trash_type');
    }
    protected $table = 'trash_type';
  
    /**
     * The attributes that are mass assignable.
     *  
     * @var array
     */
    protected $fillable = [
        'name'
    ];

}