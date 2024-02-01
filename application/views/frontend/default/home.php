<section class="home-banner-area" style="background-image: url('<?= base_url("uploads/system/" . get_frontend_settings('banner_image')); ?>');">
    <div class="home-banner-content">
        <div class="container-lg">
            <div class="row">
                <div class="col">
                    <div class="home-banner-wrap">
                        <h2><?php echo site_phrase(get_frontend_settings('banner_title')); ?></h2>
                        <p><?php echo site_phrase(get_frontend_settings('banner_sub_title')); ?></p>
                        <form class="" action="<?php echo site_url('home/search'); ?>" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" name="query" placeholder="<?php echo site_phrase('what_do_you_want_to_learn'); ?>?">
                                <div class="input-group-append">
                                    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="home-fact-area">
    <div class="container-lg">
        <div class="row">
            <?php $courses = $this->crud_model->get_courses(); ?>
            <div class="col-md-4 d-flex justify-content-center" style="border-right: 1px solid;">
                <div class="home-fact-box">
                    <img src="data:image/png;base64,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" alt="" style="float: left;margin-right: 3px;height: 60px;">
                    <div class="text-box">
                        <h4><?php
                            $status_wise_courses = $this->crud_model->get_status_wise_courses();
                            $number_of_courses = $status_wise_courses['active']->num_rows();
                            echo $number_of_courses . ' ' . site_phrase('online_courses'); ?></h4>
                        <p><?php echo site_phrase('explore_a_variety_of_fresh_topics'); ?></p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex justify-content-center" style="border-right: 1px solid;">
                <div class="home-fact-box">
                    <img src="data:image/png;base64,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" alt="" style="float: left;margin-right: 3px;height: 60px;">
                    <div class="text-box">
                        <h4><?php echo site_phrase('expert_instruction'); ?></h4>
                        <p><?php echo site_phrase('find_the_right_course_for_you'); ?></p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex justify-content-center">
                <div class="home-fact-box">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIAAAACAEAQAAAA5p3UDAAAAIGNIUk0AAHomAACAhAAA+gAAAIDoAAB1MAAA6mAAADqYAAAXcJy6UTwAAAACYktHRAAAqo0jMgAAAAlwSFlzAAAAYAAAAGAA8GtCzwAAAAd0SU1FB+cBEgIzE3O0x74AABnVSURBVHja7V15eFRFEq8eEkISQiDhFBZETrlhOVxRV7zRiKJiPMALgV3QRXE5VFDRBQFdUTwQFVHxABEV1HU5BN2ICsQAchoI4ZKQBIKEhByT9G//KF7eTGbeNfNm3iD5fV8+QqanX3VVvT6qqquIalCDGpy9EKF+AGTjxiR69SJq04YoOZkoLo6otJRQUEC0dy/R5s3CdehQOAYLxMYSevcmionx36KsjMTGjUKUloaFHtmyJYkePYhat2be1K5NVFZGyM8nkZVFyMgQrtzccNBi88DatweefhrYtg2msHcvMHs28Oc/h4wm1K8P7NplSIrcuRMyMTF0vOnXD5gzB9i/3xxvtm8HnnkG6NAhVDTZOLju3YHly4HKSnOD84e0NGDAAPtpu/9+8zTcd5/9z7/ySsgffwycL5WVwBdfAD16hEWYlgaHuDjg1VeBiorAB1gNculSyMaN7aPxxhvNP3zQIPue27QpvxR2oaKCeR0X54y0qw9QdutmamoNCLm5kJdcYo8gXC5g7lzIoiJtpSsqAl57DRC27I2Ayy6DzM8PDW927YLs1s1h4Q8dChQXh2aACsrKgNtvd3SgAfOmvDy0vCkuhhw6NPyDQ61avGkLFyoq7JsJBg4E0tP9/1xzjT3P+OtfbV0OjSBfeAFwucIjfFm7NvDZZ+ETvpR8orBngMCdd2o/64477HmGy8U0Sxk+Ni1dChkdHVrhw+UCliwJn/ALCiBTUuwdQ+gVoOpZMiUFKCgIH78WLQrpTAD861/hG8zmzUCbNvaPIXwKwErQsiWwYUP4+PbUUyES/oAB4ZvS3nsvVMeccCsAPzMujscUDlRWQl58sb0DkDExwO7doSe+rAwYPToUQnBSAdRnjx7NYww1du2CrF3bDE1RpigXI0cStW0bSuYQHTpENGSIED/9FNrnFBUR/fwzoaKC6ORJ/ltCAomoKP4sdBDitdeAjAyiJUuIWrQI3ZM6dCAxfDjR3LlBdwUZFQUcPBhajV2zxk6rX6QDsnFjYM2a0PJ03z6gVq3gicUNN4SOSCkhZ82CjDI3E/2BABkVBTlrVkj3VSZOUCYYP2RIaFhw8iTRvfcK19KloWNyYiJR+/ZEHTuSaNuWqHFjovh4Qnw8Ub16JOrV44aFhUSFhSSKi3kZyM8n7N5N9OuvRJmZwnXihN20CVdFBdGECcBPPxEtWEB0mhZbH3LLLURffhk4AyEEcPSo/aq5fTvQsaOdY4WMjoa86CLgiScgV68GcnLso/fwYchVq4ApU4D+/e02uAAdOjBP7EaQsQRAmzb2E7V4MWTduvYwrnlz4JFHgP/+V9fJYzdkURHw9dfAuHHAOefYMhZZty6weLH9xLZuHQSDBw2yjxC3G3j44eCFHh8POWwY5MqVwcUd2IWKCmDFCj5eBm+7AB5+mHllF667Lghixoyxh4icHE9nDnDOOVZNvDwbzZsHnDzpjKDNoLAQeP114LzzLI1NpqR4ziSQl1xi3xI2cmQQCjBxYvAEfP+9/8GVlAC9ehnT0Lkz8P779r4VoYbbzZa/8883Hl+vXswLPy8Jvv8+eFoeeSQIBXj00eAe/tJLnhsm3+ktOxtISvL/VrRrB7l0aWRM84GispKdZ/59GkBSEvNAgdsNPPSQyoPoaOCll4IiQY4frydjg2Pg778HpjnFxSRGjBDio4/Uwb7zDtHdd3s3PPdcorFjiZ58Um0XG0s0aRLRxIna0btWcOQIYccOEnv2EOXk8P+PHSNRVkY4dYqIiERcHCEmhkRyMlHTpkTNmhHatiXRuTNRkyaBP9vlIrrlFqKUFGDGDKKZM70jjseOZR5UiSOKaPZsoEcPIe65R7jcbqKxY4H16wlvvEEiPt46DQHKkIVhJY5OQWYmZJcuvn3dc493O7ebZxjVfQlcey3knj2Bq3t5OfDttxxFO3Ag0KBB4MJTaEpKAq69lvv87rvglqLduyGvvlrt2+ViHlTv8557fOiQXbsCmZnWZ4Ag3OmQ7dpZe9rnn+uFVPMGCage6wfExwPvvBMYU0tK2A+emgrUr68vTCHYDNupE2T37uo4u3fnvzVqZBQPyOHlt93GR7aSkoBIlvPne54YIC++GMjN5Q9ff11bHomJwOefW3uYtQ1ptcG6XEBenvFDKipYkw2YJ2NiIOfPh2zVSv1bly7Ajh3Wufjzz8DIkf6EznR36gTcfTfwyiuQP/3EG0/PMK1169T269Z5jyUnh7/z8svcR6dO/gItgPr1IUeNgszIsE7/tm1Ap04qH1q1Yt7oL3tsnHvsMXMhZ0eOBB3gCnz4ob425+dDXnFFYH3fd5+1oFIpOTbe994AZGIiB2IuW8bHMSNoKYAWCguBZcsghw71N8sBl10GfPWVJdu+LCoCqu+LTPJOXnmlccTxwoVBCZ8HpmcMWr8esmVL6326XMArr5gXPAD5zTeQfft6MyEmBnLYMFaK0lJL/VlWAE+UlgLLl7NByvuN5Zs/Vj19L74YSCiXcbRREEYg9SHR0f7dwfPmGU1X/vurXZvXbLOC37MHGDjQu4969YAJE4IzlgSjAJ44fBiYMAHS25kDDBwImZVlvp8PPzQbxOHzEmDePN/+DhywzcsKPPig2nFJCXDvvYEpU9267FQxg/JyYNo0PhZ6fn/6dOD48cAFZrcCKDh+HHL6dE8/BxAby/SavR+wYkWgfhJeTj02pfKBB2wRvqplu3bxJU5j653/PhITzQdHZmZC9u7t20dUlH1eM7sVAAC2b/f31kH27Ws+pG79+kAvp7JVMTvbSkiYhc579tSy2hl/t04dPp+bwcKFXm+R7NqVj5e83EBedZU9wtqwQaXPpqhdedVVTGNMDNPctas6joQE4IMPzPWzdi1Qp05gvE5KAnr2tFX4wYBvEZm5SFJR4Wm35o3iuHHqtDZpkvqZHZct3W7IESP4KGmHn2H5cpW+SZP4byUlbP5Wj2KQ48ebOsLJpUttCelyVvhCQL75pvFgi4o8N3qQLVpwUIcnCguBZs3483btwhNdaxZlZZDt2vGYmzXzOYbKVauA5s3V8aWkmDv+ahuFzgiY8yYePw5ceKH6nZ49eWftDwsWqEycNctpsasCnjVLpX/BAv+NDh/2vNvP0Uu//27ceRDePEeFLy+6yHhqPXbMc72CvPJKfSNOZSVknz7ctl49c1bKUCMvTzkCQvbpo++9PHHC02jGmzajq2Pl5cBf/uK0PC0Kv2FD41DywkLIfv3U7wwdam5a/+EHZU31XSYcgFy5koUpBNNmhLIy4M47VSW44ALjIJf9+wPdgIdf+BCCTaJGTFDNuZy+xUp49OLFbD0L9gr2/v3mc/VooaICmD0b8uOPzX9HSmD4cHX8V1xhbCtYvtyuxBUhVoDRo40Z4Dn4lBTHon3k5MmQkyc78my43Z6mWshRo4zpHTXKafnqC182aWJspXvpJbV9v36hzzCihfJy3rE3axb6TB4akEVFnv4NY/9IQUFE36ACFi7UH8D69UqIGId8hSp/jhksWaIqopXp227k5UHyvUv2k6Sn67dXT0IRBQ5q0FvHT56EbN+e28bE8P1/J3HZZariXn65s7Rs26ZY/jj6We8kJCVw6aVOy9tb+HC5DJNCyhEjVGV57jlnGb5rl5d1DkKELtOZSXjaEgz3A1u2hC0nkDkFuPVWfYLT0tSj28UXOx/p63tBhU22TqKyUpmV+IUyCgm/6San5X6acUJAbtqkTWh5OdC5M7etXx84cMBZRp86xQ6TNm3YvVy3Lk+7DRrwZ05i/34lxI3vQ+htTtPTnZY9K4BMSdEf1CuvqG2jotj54qAFT378MfDUU+yoad6cf8rLOf7+008dowsFBcDEiZ5uXM4Iqgd70toFpwB61i9ZVAQ0ber7neRkHpwT539P45GiAP4+CxfcbuZFcrIvn5o107/0+v33zgpf9umjOzY5fbo6mJdfBgYP9v5+ly7OmnOrK0CYIVevrn6HAhg8GHj5ZfX/zz6r30noMqwbKwDmzNEmrLRUefs5qOP0EVF+841noAT3c+utzswGTimA2w3ceqv3y9C1K+Q33/DnUiqKwcmm9QJeX3zRGeHL6GhdQ46cP18VcHUDUUUFJ2VWpz3gl1/CLwinFGDLFnXcycnMi+rLz3vvqW3eflu7r9zckGcI9asAhrmD2PcNnHuu9ttdUMCXHKZOdeZo6JQCVFYCTz7JY9dyB5eXKxdoOEZCBzZnUzWpAJ98ok3Qpk1quyBvt4YUDu8BDDF7tspHPcvp4sWByjEgaxJHvnIApF+Id99lomvVIrrttrBr5x8Gt9+uxgWqS4IvBg4M9A5AYOZE0a8fUUKC/w8Bwief8O+XXsqZuWoQGJo0IVLSvi5aRAT4b5eQQBTYaSBAe7LqSPFFRoZaBeyWW8LFqj8uOE2fEIcPEzZv1mwm9GSijcAUQNcb9dVXRMr0733ur0EguOmmqmVA6OT8Q5gUAKhTh4QaxeuLtWv53759g8uuUQNG06ZEHAir8tYPRP/+gdzVDGAG6NiRSOvWittNpNy4UQM+axAkoEQNbdjAPPaH2FjOimoNASiATgFDbNkixOm8O+R7t68GAUIwL4UoLib65RfthtazrwY4A2jBkzjvu/w1CAJQlgAioq1btRtary5q7wxAO3cSKUmaQ11f4CyC6NBBTYXDPNZqZ7XrABRAb5359Vcm5Pzzic6AGPYzBkIQFL7v2qXdLiwKoF5y9KXz4EH+pWb3bz8UnupVWreeuDoABdDLYHE6PTkaNQorbwKC202oqODSMVo76wiCUCyqR45oN7Jec8CSAnAkql62yrw8JjbCFQCrVhG1aiVcubnClZtL1KoVYfVqp8nSx2kFwGke+0V8vNXrY9ZmAMTHa6/tZWVCVFZ6ERuRyM4mMXiwEDk5yl/498GDifbtc5o6bTBPudJIebn/Ni4XwVqOIWseJKHlACIi8siBi+nTSahhTV5AUhLR4sUkgshgGRQWLuTzdLWhuYqKOAjjiSccIQtZWSRSU4mOH/f/uVLhjIh5rZEDSCQkqNXQjGHRhahjaoS6jgpXfj5Rfr7/hnv3AmlpRE4pgPrm+0JvfQ0xRFqaED//bK6x3p7FmjnYmgKguJi0Vhihmochr76ahJoNwxsNGhClpgbNsEChl+UMPXuSY4fX224DjhzRzO6NzZuFa8UK/r1OHU064Tu72QYgNlY7KkXVSmDGDKdjabRx6hRkt24+Y5Ndujh/MUQPM2ao/NULX1fzKpqBpU2gECUlRBUV/j+NilIfrrdTdRp16ijTJFflaN4cctQoEt99xw6VSAXzlLOMa2UPc7tZRuYRQBhRcTGRViLDpk2JsrMJ+fnOTaVG+OAD4dq4EbjhBqLPPyciilxaPaGUgONMaf5hfvOnIABDkF4RRYW4SJ0BSkoIjz/OYdQzZzpNjSVUnf99b1qpKCy02q11BcDevdofKnUA9HbaTmL2bOE6cIDE3/4WiN3cWSg8VWst+EBXNv5hXQFEZqb2h0qVrJ07iaytRaFHXh5h5kz2qqk1is4MnDqlOoHUIhM+EKedcRYQwBKg9xBWAOFyu8nj9ktEAJMnC1dhIWHKFCLfi5iRjc2b2QJIRLql6MKiAHruSI/QZBEh99eJiGjHDqIFC4DzziMxZozT1FjHxo1Vvwqd8G/oycY/bJ4BWreuKhIJD6KdBsaN4zdo5kx7StGFm362EHK+YZ09gO7ybBctEIKLEWlA8l2A0BSeNgtPg87XXxMpqWutJKOMJLDZHHLIEO02hw8HkkjS8gwgBED07bfaLfjKmBBZWboXGUKKp57i42plJWH8eEAIEjNnnplRShkZQpze3Qu15qAv1qxh2VhDgBdD9OLTU1KqNFGoufjCiw0biJ55hujNN4Vr2zaiO+4g0rvLEMlgHnIshl4RKB2Z2A3Itm11Z6zT2S8h27d3Zsps3ZqLXSUns/9i3z5n6LABVUkk+/UzGnMgsgxoBhCuPXuIDhzQbnDHHdwuM5Mo3MfBykrCoUPC5XYLcewYUWws4f77CVdfTfTdd+GlJUhg0ybmNVXx1D+ys4XIzg4vbfLf/9bWxrw8NSXsAw+E95XZv9+HVjRoAPmf/4SXDjswejTzsHZt/WwsapLJMCpA9+76xHMiQyAuTjst3GefAR06cA4hM9U+zcD7LefcO8EUpA4FCgvZ/dyxo3Y9pdxcxbsK3HyzbnfVci6FTwmwZYs2VWlparspU7w/27q1ernZgCpj+4Vnbp3UVP00a07B22DD9QK2bvVqIidPVsehkzVUZmQ4Inwm7JFHdMd5uiIIZ+YsLASOHgXGjPHMZsE+eQuVRA3x9NNArVpcUyiSz/2LFnkXkoqKAsaMYR4VFgINGjB/LrhAvx/ftLdhVACjXPvLlqkDvP56z7InXEvwsceMy6VYxcSJ5quTOgxZVAQ8/rhnjUAgKQny+uvV/+uVyCsrg3T4Eg7k/Pn6o/Q9f/OatndvaLgaSeXkzCI7G7j5Zl8+9e+v+zX55puOCp8VoF07/Rg1dVPGxaSsVtY+iyDXroVs2FBVgP/9T7ux2w20aROs/ILOOS9cu3cr1ir/uOQS4PbbufGxY+zbroFfiPJy5hERVxZTEkT5w6JFQmRlOU0yMbGdOuknejxypGpTIxs31nUmna2Q+flVlVGRlMTHQM3GsnqOYcdhXBj57bfVtoMHO83vyMONN6r8efdd/bachzGiwCeCEyd06Zac8ozbv/WW0yyPGMg33lD5kpqq3/j4ccd3/ppKIP/xD33iCwqq8t/KmBjItWud5r3zWLNGye7FeZWNyu5FcEQTG2AyMnTpl5s2AXzFnOv/Ol09zEls3aqWiImNhdy4Ub99enrEl5SH7NvXuBDjkiVqEakWLZyvI+QE9u9XLIEcZaWTfBsA89TB4hDWlGD8eMPxy+efr2qPzp2BnBxzjKuogBwyhEO8jh51Wozs6Orfn4temC05c/gwoIZ363tWFYwb57RczSsAhAC+/NJwTF4Oj9atzdXumztXZVwkmHxP39glImDuXOMx79wJnHuu+p3qjjJ/WLbsjCgc7a0EycmmpnY5frz3d/RKsBcUKJYynjUcKjrtBbe7qiyebNhQuwAEAKxb510lZeJE4/737TtjSsf7KsGFF3J5NiNMm6Z+JzZWu3zbQw9VtZMrVzot+irIlStV+h96yH+bpUtV/74QxsWgAL7Kfoan3AVuvNHc2vjWW0rNPGbQ6NFelcXlzp1VUUYYNMgeyZWV2ec8GjSIFTM6mqd5BcXFwN//rm56Y2KABQuM+3O7lT7PeECOGGHON5+W5lkenSNmlGraXCSRGbh7d/ACO3qUK3I1awYcOxZ8f7t3q+f5a67hv6WnA2pqXcgmTYxLwgLMq+HDnZabvUqAxx83x8iDBz2rY/MbNWyY2s+ECcELCwB++EHtU2/fYQUTJqh0DxvmWc0LGDAAOHTIXD+PPea0vEKkBM88Y44BlZXAtGmeZVT5+/XrG5qbTWPdOrXfdevs6fPECTWnr6IItWtDTp9uvira1KlOyynESjBmjHlmZGaiWiUMDkZ9773gTwB2KkBlJfDFF9U3bGwf2LbNXB9SnlFn/eCUIDXV/OZLSnYceecohmzXDvKNN/SraoZaAUpLgXnzlMsban/NmzPNZmMSS0s9HWVnBTgS1srm69QpDvT0vtvPy8LddwNffGFNGQJVgNJSYPlyyLvu4rT4nmNq2BDyuecsZRuT+fnAgAFOy8MRQLZsaX0DVlwMvPpq9beO+0tMhBw2jP3p27frLzVmFaCykvt65x3e2PkmyOKwuNde8zq2mkJaGmSLFk7KwHHzIu+Up00j8c9/Wru9KyXR6tVcUPHTT/2lR4NMSCDRqxehTx8SrVoRmjQh0aQJUaNGfJ2KL1sCX31F1Lo1UX4+ITeXRG4u5w1OTydkZAiXb/YtIC6OcNNNRHfdReLyy4lcFsLrAKKZMwlTplRl/jjbAVx3HfDbb9beIAWFhcCSJTwthy5TOWSjRrzcfPJJ4OHsBw8qNo0aVANkQgLkCy8Et8OXEtixgy2LI0bwTpzjES3RgqQk/u7IkZDz57N1L5iLJuXlkM8/D2ktm3eo4fwSgAcf5OSTCxYoCQ4gu3UjMXeuvXf6jx0jyskh5OQQ/f47iaIiNelydDSnWa9fn8Q553AuPjsTSaWlEcaMES4u+MRm4fvuI4qLE1pZ1c8GsHXs9NsuV63yvOPO/oDUVP37h5GOzZs5rYu6t+HcBYob2+0+i08ALVr4hj4/+KBPOwjBzp/1650Wp2nIH3/kq3C+m1rfuMncXKdPAmEHm0d//NGbER9+aPy9K64AFi8252ION06d4gufl19uOA589JGvwmgUgPgjgs/MngzYuRNSrxpJte/LxETe8a9a5fwN4PR0YOzY6gYq/fHHx/tcB8errzotl7AA8q67vAd+4gSk9Zq3an8tWwLDhwPvv8+xdqHGb78BCxcC994L+ac/BU53+/Y+ji0Pr+cfEkCPHt5mUik9b8TY84zzz4ccNQqYMwdYsYJDqgKZJaTkW7srVgBz5nCf1mvz6tM6eLA3bcXFkN27h1MmYTsGAg0aENLTvYtFzZghxKOPhv7ZsbGEtm25nF3duuqPYh84fpyoqKjqB3l5JLKyrBZfCIy2Z58lmjRJ/UNWFonevYXQKB1zpoKdNZ4v2OrVEX/JISx8qVWLeeGJ5cudpsveQcpu3bwHeOBAKE22ZxrYxFwtgjrSbv8GN8DGjVXbeWnpGR/pGgLwjSrleFtY+Id7QYCePYGpUyF793aalkgFZO/ewNSpgFbJvRrUoAY1sBP/BximNES0eR/LAAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDIzLTAxLTE4VDAyOjUxOjE5KzAwOjAwsUgonAAAACV0RVh0ZGF0ZTptb2RpZnkAMjAyMy0wMS0xOFQwMjo1MToxOSswMDowMMAVkCAAAAAodEVYdGRhdGU6dGltZXN0YW1wADIwMjMtMDEtMThUMDI6NTE6MTkrMDA6MDCXALH/AAAAAElFTkSuQmCC" alt="" style="float: left;margin-right: 3px;height: 60px;">
                    <div class="text-box">
                        <h4><?php echo site_phrase('lifetime_access'); ?></h4>
                        <p><?php echo site_phrase('learn_on_your_schedule'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="course-carousel-area">
    <div class="container-lg">
        <div class="row">
            <div class="col-12">
                <h2 class="course-carousel-title my-4">
                    Học theo chuyên ngành
                </h2>

                <?php $tabCourseOfYou = $this->crud_model->get_tab_course_for_you() ?>
                <ul class="nav nav-tabs nav-tab-course-for-you p-0">
                    <?php foreach ($tabCourseOfYou as $tab) : ?>
                        <li class="nav-item" data-id="<?= $tab['id'] ?>">
                            <a class="nav-link" data-toggle="tab" href="#<?= $tab['slug'] ?>"><?= $tab['name'] ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <!-- Animated page loader -->
                <?php $animatePageData = [
                    'id' => 'course_for_you',
                    'cls_show_after' => '.course-for-you-after-loading'
                ] ?>
                <?php include "animated-page-loader.php"; ?>
                <div class="course-for-you-after-loading mt-3" style="display: none;"></div>
            </div>
        </div>
    </div>
</section>

<section class="course-carousel-area">
    <div class="container-lg">
        <div class="row">
            <div class="col-12">
                <h2 class="course-carousel-title my-4">
                    Học theo website
                </h2>

                <?php $tabCourseOfYou = $this->crud_model->get_tab_course_for_you() ?>
                <ul class="nav nav-tabs nav-tab-course-for-you p-0">
                    <?php foreach ($tabCourseOfYou as $tab) : ?>
                        <li class="nav-item" data-id="<?= $tab['id'] ?>">
                            <a class="nav-link" data-toggle="tab" href="#<?= $tab['slug'] ?>"><?= $tab['name'] ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <!-- Animated page loader -->
                <?php $animatePageData = [
                    'id' => 'course_for_you',
                    'cls_show_after' => '.course-for-you-after-loading'
                ] ?>
                <?php include "animated-page-loader.php"; ?>
                <div class="course-for-you-after-loading mt-3" style="display: none;"></div>
            </div>
        </div>
    </div>
</section>

<section class="course-carousel-area">
    <div class="container-lg">
        <div class="row">
            <div class="col-12">
                <h2 class="course-carousel-title my-4">
                    Học theo trend
                </h2>

                <?php $tabCourseOfYou = $this->crud_model->get_tab_course_for_you() ?>
                <ul class="nav nav-tabs nav-tab-course-for-you p-0">
                    <?php foreach ($tabCourseOfYou as $tab) : ?>
                        <li class="nav-item" data-id="<?= $tab['id'] ?>">
                            <a class="nav-link" data-toggle="tab" href="#<?= $tab['slug'] ?>"><?= $tab['name'] ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <!-- Animated page loader -->
                <?php $animatePageData = [
                    'id' => 'course_for_you',
                    'cls_show_after' => '.course-for-you-after-loading'
                ] ?>
                <?php include "animated-page-loader.php"; ?>
                <div class="course-for-you-after-loading mt-3" style="display: none;"></div>
            </div>
        </div>
    </div>
</section>

<!-- <section class="course-carousel-area">
    <div class="container-lg">
        <div class="row">
            <div class="col-12">
                <h2 class="course-carousel-title my-4">Khóa học mới cập nhật</h2>
                <?php //$courseLatest = $this->crud_model->get_courses_latest() 
                ?>
                <div class="mt-3">
                    <?php //$this->load->view('frontend/' . get_frontend_settings('theme') . '/components/course_box_wrap', [
                    // 'courses' => $courseLatest
                    //]) 
                    ?>
                </div>
            </div>
        </div>
    </div>
</section> -->



<script type="text/javascript">
    function handleWishList(elem) {
        $.ajax({
            url: '<?php echo site_url('home/handleWishList'); ?>',
            type: 'POST',
            data: {
                course_id: elem.id
            },
            success: function(response) {
                if (!response) {
                    window.location.replace("<?php echo site_url('login'); ?>");
                } else {
                    if ($(elem).hasClass('active')) {
                        $(elem).removeClass('active')
                    } else {
                        $(elem).addClass('active')
                    }
                    $('#wishlist_items').html(response);
                }
            }
        });
    }

    function handleCartItems(elem) {
        url1 = '<?php echo site_url('home/handleCartItems'); ?>';
        url2 = '<?php echo site_url('home/refreshWishList'); ?>';
        $.ajax({
            url: url1,
            type: 'POST',
            data: {
                course_id: elem.id
            },
            success: function(response) {
                $('#cart_items').html(response);
                if ($(elem).hasClass('addedToCart')) {
                    $('.big-cart-button-' + elem.id).removeClass('addedToCart')
                    $('.big-cart-button-' + elem.id).text("<?php echo site_phrase('add_to_cart'); ?>");
                } else {
                    $('.big-cart-button-' + elem.id).addClass('addedToCart')
                    $('.big-cart-button-' + elem.id).text("<?php echo site_phrase('added_to_cart'); ?>");
                }
                $.ajax({
                    url: url2,
                    type: 'POST',
                    success: function(response) {
                        $('#wishlist_items').html(response);
                    }
                });
            }
        });
    }

    function handleEnrolledButton() {
        $.ajax({
            url: '<?php echo site_url('home/isLoggedIn'); ?>',
            success: function(response) {
                if (!response) {
                    window.location.replace("<?php echo site_url('login'); ?>");
                }
            }
        });
    }

    function setWebUiPopver(el) {
        if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            if ($(window).width() >= 840) {
                $(el).webuiPopover({
                    trigger: 'hover',
                    animation: 'pop',
                    placement: 'horizontal',
                    delay: {
                        show: 500,
                        hide: null
                    },
                    width: 330
                });
            } else {
                $(el).webuiPopover('destroy').webuiPopover({
                    trigger: 'hover',
                    animation: 'pop',
                    placement: 'vertical',
                    delay: {
                        show: 100,
                        hide: null
                    },
                    width: 335
                });
            }
        }
    }

    function setSlickForLearnFromExpert() {
        $('.learn_from_expert_box').slick({
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            adaptiveHeight: true
        });
    }

    $(document).ready(function() {
        setWebUiPopver('a.has-popover');
        setSlickForLearnFromExpert();
    });

    $('.course-compare').click(function(e) {
        e.preventDefault()
        var redirect_to = $(this).attr('redirect_to');
        window.location.replace(redirect_to);
    });

    function getCourseForYou(cat_id, el) {
        // CourseLoader_course_for_you.show();
        $.get('<?= site_url('home/get_course_for_you') ?>', {
            cat_id
        }).then((html) => {
            $(el).find('.course-for-you-after-loading').html(html);
            CourseLoader_course_for_you.hide();
            setWebUiPopver('.course-for-you-after-loading a.has-popover');
        });
    }

    $('.course-carousel-area').each((_, el) => {
        $(el).find('.nav-tab-course-for-you .nav-item').on('click', function() {
            if ($(this).find('a').hasClass('active')) return;
            const cat_id = $(this).attr('data-id');
            getCourseForYou(cat_id, el);
        });
    })



    $(() => {
        $('.nav-tab-course-for-you .nav-item:first-child').click();
        $('.nav-tab-course-for-you .nav-item:first-child .nav-link').click();
    });
</script>
