<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class NikOtomatis extends Component
{
    public $emails, $nik, $user_id, $tgl_lahir;

    public function mount($karyawan = null)
    {
        if ($karyawan != null ) {
            $this->nik = $karyawan->nik;
            $this->user_id = $karyawan->user_id;
            $this->tgl_lahir = $karyawan->tanggal_lahir;
            
        }
    }
    public function buatNik()
    {
        $tgl_lahir = Str::remove('-', $this->tgl_lahir);
        $this->nik = $this->user_id.$tgl_lahir;
        return $this->nik;
        // dd($this->nik);
    }
    public function render()
    {
        return view('livewire.nik-otomatis', [
            'emails' => $this->emails,
            'nik'    => $this->buatNik(),
        ]);
    }
}
