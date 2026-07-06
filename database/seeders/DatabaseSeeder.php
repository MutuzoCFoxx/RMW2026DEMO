<?php

namespace Database\Seeders;

use App\Models\Exhibitor;
use App\Models\ProgramSession;
use App\Models\Speaker;
use App\Models\Sponsor;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database with a demo admin user and
     * illustrative Rwanda Mining Week 2026 content.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@rmw2026.rw'],
            ['name' => 'RMW Admin', 'password' => Hash::make('password')]
        );

        $this->seedSpeakers();
        $this->seedSponsors();
        $this->seedExhibitors();
        $this->seedProgram();
    }

    private function seedSpeakers(): void
    {
        $speakers = [
            ['name' => 'Hon. Francis Gatare', 'job_title' => 'CEO', 'organization' => 'Rwanda Mines, Petroleum and Gas Board', 'country' => 'Rwanda', 'is_keynote' => true],
            ['name' => 'Dr. Aline Uwase', 'job_title' => 'Director of Investment', 'organization' => 'Rwanda Development Board', 'country' => 'Rwanda', 'is_keynote' => true],
            ['name' => 'James Okoro', 'job_title' => 'Regional Director', 'organization' => 'Africa Mining Investment Council', 'country' => 'Nigeria'],
            ['name' => 'Sophie Mbeki', 'job_title' => 'Head of ESG', 'organization' => 'Continental Minerals Group', 'country' => 'South Africa'],
            ['name' => 'Dr. Peter Nkurunziza', 'job_title' => 'Senior Geologist', 'organization' => 'University of Rwanda', 'country' => 'Rwanda'],
            ['name' => 'Amara Chukwu', 'job_title' => 'Managing Partner', 'organization' => 'Extractive Capital Partners', 'country' => 'Ghana'],
            ['name' => 'Elise Mukamana', 'job_title' => 'Sustainability Lead', 'organization' => 'Rwanda Mining Association', 'country' => 'Rwanda'],
            ['name' => 'Robert Kagina', 'job_title' => 'VP Operations', 'organization' => 'Great Lakes Minerals Ltd', 'country' => 'DRC'],
        ];

        foreach ($speakers as $i => $speaker) {
            Speaker::firstOrCreate(
                ['name' => $speaker['name']],
                $speaker + ['sort_order' => $i]
            );
        }
    }

    private function seedSponsors(): void
    {
        $sponsors = [
            ['name' => 'Kivu Capital Holdings', 'tier' => 'platinum'],
            ['name' => 'Continental Ore Bank', 'tier' => 'platinum'],
            ['name' => 'Meridian Energy Partners', 'tier' => 'gold'],
            ['name' => 'Highland Minerals Finance', 'tier' => 'gold'],
            ['name' => 'Lakeside Trust Bank', 'tier' => 'silver'],
            ['name' => 'Great Lakes Extractives Alliance', 'tier' => 'partner'],
        ];

        foreach ($sponsors as $i => $sponsor) {
            Sponsor::firstOrCreate(
                ['name' => $sponsor['name']],
                $sponsor + ['sort_order' => $i]
            );
        }
    }

    private function seedExhibitors(): void
    {
        $exhibitors = [
            ['company_name' => 'Sandvik Mining Equipment', 'booth_number' => 'MH1-01', 'country' => 'Sweden'],
            ['company_name' => 'Epiroc East Africa', 'booth_number' => 'MH1-05', 'country' => 'Kenya'],
            ['company_name' => 'Rwanda Geology Services', 'booth_number' => 'MH2-02', 'country' => 'Rwanda'],
            ['company_name' => 'AfricaGeo Drilling Ltd', 'booth_number' => 'MH2-08', 'country' => 'Rwanda'],
            ['company_name' => 'Continental Refinery Solutions', 'booth_number' => 'MH3-03', 'country' => 'South Africa'],
            ['company_name' => 'SafeMine Safety Systems', 'booth_number' => 'MH3-10', 'country' => 'Rwanda'],
        ];

        foreach ($exhibitors as $exhibitor) {
            Exhibitor::firstOrCreate(['company_name' => $exhibitor['company_name']], $exhibitor);
        }
    }

    private function seedProgram(): void
    {
        $day1 = '2026-12-09';
        $day2 = '2026-12-10';
        $day3 = '2026-12-11';

        $sessions = [
            [$day1, '08:00', '09:00', 'Registration & Accreditation', 'break', 'Foyer 1A', null],
            [$day1, '09:00', '10:00', 'Opening Ceremony', 'plenary', 'Auditorium', 'Hon. Francis Gatare'],
            [$day1, '10:00', '11:00', 'Keynote: Extractive Industry for Sustainable Futures', 'plenary', 'Auditorium', 'Dr. Aline Uwase'],
            [$day1, '11:00', '11:30', 'Networking Coffee Break', 'networking', 'Foyer 1A', null],
            [$day1, '11:30', '13:00', 'Panel: Attracting Global Investment to Rwanda\'s Mining Sector', 'plenary', 'Auditorium', 'James Okoro'],
            [$day1, '13:00', '14:00', 'Lunch', 'break', 'MH Foyer', null],
            [$day1, '14:00', '17:00', 'Exhibition Hall Opens', 'exhibition', 'MH1, MH2, MH3 & MH4', null],
            [$day1, '18:00', '20:00', 'Welcome Cocktail Reception', 'networking', 'KCC Gardens', null],

            [$day2, '09:00', '10:30', 'Breakout: ESG & Responsible Mining Practices', 'breakout', 'AD4', 'Sophie Mbeki'],
            [$day2, '09:00', '10:30', 'Breakout: Geological Research & Innovation', 'breakout', 'AD5', 'Dr. Peter Nkurunziza'],
            [$day2, '10:30', '11:00', 'Coffee Break', 'networking', 'Foyer 1A', null],
            [$day2, '11:00', '13:00', 'B2B Meetings & C-Suite Sideline Discussions', 'breakout', 'AD6 – AD12', null],
            [$day2, '13:00', '14:00', 'Lunch', 'break', 'MH Foyer', null],
            [$day2, '14:00', '15:30', 'Panel: Financing the Extractive Value Chain', 'plenary', 'Auditorium', 'Amara Chukwu'],
            [$day2, '19:00', '22:00', 'Gala Dinner', 'gala', 'MH (between MH2 & MH3)', null],

            [$day3, '09:00', '10:30', 'Panel: Regional Cooperation in the Great Lakes Mining Corridor', 'plenary', 'Auditorium', 'Robert Kagina'],
            [$day3, '10:30', '11:00', 'Coffee Break', 'networking', 'Foyer 1A', null],
            [$day3, '11:00', '12:30', 'Closing Panel & Way Forward', 'plenary', 'Auditorium', 'Elise Mukamana'],
            [$day3, '12:30', '13:00', 'Closing Remarks', 'plenary', 'Auditorium', 'Hon. Francis Gatare'],
            [$day3, '14:00', '17:00', 'Optional Site Visits to Mining Operations', 'site_visit', 'Off-site', null],
        ];

        foreach ($sessions as $i => [$date, $start, $end, $title, $type, $hall, $speaker]) {
            ProgramSession::firstOrCreate(
                ['session_date' => $date, 'start_time' => $start, 'title' => $title],
                [
                    'end_time' => $end,
                    'session_type' => $type,
                    'venue_hall' => $hall,
                    'speaker_name' => $speaker,
                    'sort_order' => $i,
                ]
            );
        }
    }
}
