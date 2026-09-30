<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $user_id
 * @property string $url
 * @property string $title
 * @property string $source
 * @property string $content_type
 * @property Carbon $analyzed_at
 * @property int $fact_confidence
 * @property string $fact_status
 * @property string $main_claim
 * @property string $intent
 * @property string $age_recommendation
 * @property array<int, array{band: string, status: string}> $age_suitability
 * @property array<int, string> $language_indicators
 * @property string $explanation
 * @property string $recommendation
 * @property array<int, array{name: string, title: string, reference: string}> $source_references
 * @property bool $is_demo
 */
#[Fillable(['user_id', 'url', 'title', 'source', 'content_type', 'analyzed_at', 'fact_confidence', 'fact_status', 'main_claim', 'intent', 'age_recommendation', 'age_suitability', 'language_indicators', 'explanation', 'recommendation', 'source_references', 'is_demo'])]
class Analysis extends Model
{
    /** @return array<string, array<string, mixed>> */
    public static function demoScenarios(): array
    {
        return [
            'https://example.com/litera-demo-provocative-social' => [
                'title' => 'Jangan Abaikan Klaim Air Lemon untuk Membersihkan Racun',
                'source' => 'Media sosial',
                'content_type' => 'Video / Media Sosial',
                'analyzed_at' => '2025-01-15 09:00:00',
                'fact_confidence' => 48,
                'fact_status' => 'PERLU DIPERIKSA',
                'main_claim' => 'Air lemon setiap pagi membersihkan racun, dan orang yang meragukannya tidak peduli pada kesehatanmu.',
                'intent' => 'Provokatif',
                'age_recommendation' => 'Rekomendasi berdasarkan karakteristik bahasa dan tahap perkembangan.',
                'age_suitability' => [
                    ['band' => '<13 tahun', 'status' => 'Tidak disarankan'],
                    ['band' => '13–15 tahun', 'status' => 'Tidak disarankan'],
                    ['band' => '16–17 tahun', 'status' => 'Perlu pertimbangan'],
                    ['band' => '18+ tahun', 'status' => 'Sesuai'],
                ],
                'language_indicators' => ['Bahasa emosional', 'Framing berlebihan', 'Ajakan membentuk reaksi'],
                'explanation' => 'Pilihan kata “jangan percaya siapa pun” membangun ketidakpercayaan dan dapat mendorong reaksi emosional sebelum pembaca memeriksa konteks dan sumber.',
                'recommendation' => 'Periksa sumber dan konteks sebelum mempercayai atau membagikan informasi ini.',
                'source_references' => [
                    ['name' => 'LITERA Reference Library', 'title' => 'Health Claim Review', 'reference' => 'Ref. FC-002'],
                ],
                'is_demo' => true,
            ],
            'https://example.com/litera-demo-educational' => [
                'title' => 'Cara Mengenali Informasi yang Belum Terverifikasi',
                'source' => 'Media sosial',
                'content_type' => 'Artikel / Media Sosial',
                'analyzed_at' => '2025-01-15 09:00:00',
                'fact_confidence' => 91,
                'fact_status' => 'DUKUNGAN SUMBER TERSEDIA',
                'main_claim' => 'Kenali ciri-ciri informasi yang belum terverifikasi di media sosial.',
                'intent' => 'Edukatif',
                'age_recommendation' => 'Rekomendasi berbasis karakteristik bahasa dan tahap perkembangan, bukan klasifikasi hukum.',
                'age_suitability' => [
                    ['band' => '<13 tahun', 'status' => 'Sesuai'],
                    ['band' => '13–15 tahun', 'status' => 'Sesuai'],
                    ['band' => '16–17 tahun', 'status' => 'Sesuai'],
                    ['band' => '18+ tahun', 'status' => 'Sesuai'],
                ],
                'language_indicators' => ['Bahasa informatif', 'Penjelasan bertahap', 'Tidak ditemukan ajakan berlebihan'],
                'explanation' => 'Konten berfokus pada penjelasan dan langkah mengenali informasi, bukan mendorong pengguna membeli atau mengikuti suatu tindakan.',
                'recommendation' => 'Gunakan informasi ini sebagai panduan awal dan tetap periksa sumber utama.',
                'source_references' => [
                    ['name' => 'LITERA Reference Library', 'title' => 'Information Verification Review', 'reference' => 'Ref. FC-EDU-001'],
                ],
                'is_demo' => true,
            ],
            'https://example.com/litera-demo-persuasive-health' => [
                'title' => 'Minum Air Lemon Setiap Pagi Dijamin Membersihkan Racun dalam Tubuh',
                'source' => 'Media sosial',
                'content_type' => 'Video / Media Sosial',
                'analyzed_at' => '2025-01-15 09:00:00',
                'fact_confidence' => 72,
                'fact_status' => 'PERLU DIPERIKSA',
                'main_claim' => 'Minum air lemon setiap pagi dijamin membersihkan seluruh racun dalam tubuh.',
                'intent' => 'Persuasif',
                'age_recommendation' => 'Rekomendasi berbasis karakteristik bahasa dan tahap perkembangan, bukan klasifikasi hukum.',
                'age_suitability' => [
                    ['band' => '<13 tahun', 'status' => 'Tidak disarankan'],
                    ['band' => '13–15 tahun', 'status' => 'Perlu pertimbangan'],
                    ['band' => '16–17 tahun', 'status' => 'Sesuai'],
                    ['band' => '18+ tahun', 'status' => 'Sesuai'],
                ],
                'language_indicators' => ['Diksi emosional', 'Klaim tanpa sumber', 'Generalisasi berlebihan'],
                'explanation' => 'Frasa “dijamin” membuat klaim terdengar sangat pasti, sementara dukungan sumber yang ditampilkan tidak memadai.',
                'recommendation' => 'Periksa sumber dan bukti pendukung sebelum mempercayai atau membagikan informasi ini.',
                'source_references' => [
                    ['name' => 'LITERA Reference Library', 'title' => 'Health Claim Review', 'reference' => 'Ref. FC-001'],
                ],
                'is_demo' => true,
            ],
            'https://example.com/litera-demo-commercial' => [
                'title' => 'Produk Ini Dijamin Membuat Kulit Tampak Lebih Cerah dalam 3 Hari',
                'source' => 'Media sosial',
                'content_type' => 'Konten Promosi / Media Sosial',
                'analyzed_at' => '2025-01-15 09:00:00',
                'fact_confidence' => 55,
                'fact_status' => 'PERLU DIPERIKSA',
                'main_claim' => 'Produk ini dijamin membuat kulit tampak lebih cerah dalam tiga hari.',
                'intent' => 'Komersial',
                'age_recommendation' => 'Rekomendasi berbasis karakteristik bahasa dan tahap perkembangan, bukan klasifikasi hukum.',
                'age_suitability' => [
                    ['band' => '<13 tahun', 'status' => 'Perlu pertimbangan'],
                    ['band' => '13–15 tahun', 'status' => 'Perlu pertimbangan'],
                    ['band' => '16–17 tahun', 'status' => 'Sesuai'],
                    ['band' => '18+ tahun', 'status' => 'Sesuai'],
                ],
                'language_indicators' => ['Bahasa promosi', 'Klaim manfaat sangat pasti', 'Ajakan membeli'],
                'explanation' => 'Konten menggunakan bahasa promosi dan klaim manfaat yang sangat pasti untuk mendorong keputusan pembelian.',
                'recommendation' => 'Periksa bukti manfaat, sumber klaim, dan informasi produk sebelum membeli.',
                'source_references' => [
                    ['name' => 'LITERA Reference Library', 'title' => 'Product Benefit Review', 'reference' => 'Ref. FC-003'],
                ],
                'is_demo' => true,
            ],
        ];
    }

    /** @return array<string, mixed>|null */
    public static function demoAttributesFor(string $url): ?array
    {
        return self::demoScenarios()[$url] ?? null;
    }

    /** @return array<string, string> */
    protected function casts(): array
    {
        return [
            'analyzed_at' => 'datetime',
            'age_suitability' => 'array',
            'language_indicators' => 'array',
            'source_references' => 'array',
            'is_demo' => 'boolean',
        ];
    }
}
