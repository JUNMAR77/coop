<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Member;
use Tests\TestCase;

class MemberManagementTest extends TestCase
{
    use RefreshDatabase;
    /** 
     * @test 
     * */
    public function a_member_can_be_registered_to_the_coop()
    {
        $response = $this->post('/members', $this->data() );

        $member = Member::first();

        $this->assertCount(1, Member::all());

        $response->assertRedirect($member->path());
    }
    
    /** @test */
    public function a_member_can_be_updated()
    {
        $this->post('/members', $this->data());
        $member = Member::first();
        $response = $this->patch($member->path(), [
            'first_name'=> 'Fredeswinda',
            'last_name' => 'Alcazar',
            'middle_name' => 'Valmoria',
            'birth_date' => '1944-10-21',
            'birth_place' => 'Talibon Bohol',
            'age' => '75',
            //'gender' => 'male',
            'civil_status' => 'Widow',
            'present_address' => 'San Jose Talibon Bohol',
            'landline_no' => '0385155320',
            'mobile_no' => '09177027824',
            'status' => 'deactivated',
            'category' => 'active',
        ]);
        $this->assertEquals('Fredeswinda', Member::first()->first_name);
        //$this->assertEquals(2, Member::first()->author_id);
        $response->assertRedirect($member->fresh()->path());
    }
    /** 
     * @test 
     * */
    public function a_member_can_be_showed_from_the_coop()
    {
        $this->withoutExceptionHandling();

    }

    private function data()
    {
        return [
            'first_name'=> 'Junmar II',
            'last_name' => 'Sales',
            'middle_name' => 'Auxtero',
            'birth_date' => '1977-12-21',
            'birth_place' => 'Talibon Bohol',
            'age' => '41',
            //'gender' => 'male',
            'civil_status' => 'Married',
            'present_address' => 'San Jose Talibon Bohol',
            'landline_no' => '0385155320',
            'mobile_no' => '09177027824',
            'status' => 'active',
            'category' => 'active',
        ];
    }
}
