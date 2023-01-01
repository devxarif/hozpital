<?php

it('has admin/doctor page', function () {
    $response = $this->get('/admin/doctor');

    $response->assertStatus(200);
});
