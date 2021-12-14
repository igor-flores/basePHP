<?php

class ScheduleController
{
    public function index()
    {
        $render = new Render();
        $render->writeOnBody('
            <a href="'. _PATH. 'schedule/register/">Registrar Horários</a>

        ');
        $render->show();
    }

    public function register()
    {
        $render = new Render('scheduleRegister');
        $render->setTitle('Agenda');
        $render->show();
    }
}