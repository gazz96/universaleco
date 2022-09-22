<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Theme extends CI_Controller {

    // Hal 1
    public function index()
    {
        $this->load->view('theme/index');
    }

    // Hal 1
    public function jualLimbahAc() {
        $this->load->view('theme/jual-limbah-ac');
    }

    // Hal 2
    public function jualLimbahCpu() {
        $this->load->view('theme/jual-limbah-cpu');
    }

    // Hal 3
    public function jualLimbahKulkas() {
        $this->load->view('theme/jual-limbah-kulkas');
    }

    // Hal 4
    public function jualLaptopBekas() {
        $this->load->view('theme/jual-laptop-bekas');
    }

    // Hal 5
    public function jualLimbbahMesinCuci() {
        $this->load->view('theme/jual-limbah-mesin-cuci');
    }

    // Hal 6
    public function jualLimbahLcd() {
        $this->load->view('theme/jual-limbah-lcd');
    }

    // Hal 7
    public function pembuanganLimbahCair() {
        $this->load->view('theme/pembuangan-limbah-cair');
    }

    // Hal 8
    public function pembuanganLimbahLogam() {
        $this->load->view('theme/pembuangan-limbah-logam');
    }

}

/* End of file Theme.php */
