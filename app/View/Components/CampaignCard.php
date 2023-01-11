<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CampaignCard extends Component
{
    /**
     * The progress.
     *
     * @var string
     */
    public $progress;

    /**
     * The data campaign.
     *
     * @var string
     */
    public $campaign;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($campaign)
    {
        $this->campaign = $campaign;
        $this->progress = ($campaign->donations_sum_amount / $campaign->target_amount) * 100;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.campaign-card');
    }
}
